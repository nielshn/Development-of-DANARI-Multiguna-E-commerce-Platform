<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $code = 'STORE-' . mt_rand(0000000, 9999999);
        $selectedCartIds = explode(',', $request->cart_ids);
        $totalPrice = $request->input('total_price');

        // Check if address exists, if not create one
        $address = $user->address;
        if (!$address) {
            return redirect()->route('cartItem-products.index')->with('error', 'Mohon atur alamat pengiriman Anda terlebih dahulu.');
        }

        if (empty($selectedCartIds)) {
            return redirect()->back()->with('error', 'No products selected for checkout.');
        }

        $cartItems = Cart::whereIn('id', $selectedCartIds)->with('product')->get();
        $totalPrice = $cartItems->sum(fn ($cartItem) => $cartItem->quantity * $cartItem->product->price);

        // Ensure total price is greater than 0
        if ($totalPrice <= 0) {
            return redirect()->back()->with('error', 'Total price must be greater than zero.');
        }

        DB::beginTransaction();
        try {
            // create transaction
            $transaction = Transaction::create([
                'users_id' => $user->id,
                'insurance_price' => 0,
                'shipping_price' => 0,
                'total_price' => $totalPrice,
                'transaction_status' => 'PENDING',
                'code' => $code,
            ]);

            foreach ($cartItems as $cartItem) {
                $trx = 'TRX' . mt_rand(0000000, 9999999);
                $quantity = $request->input('quantity_' . $cartItem->id);
                if ($quantity) {
                    $cartItem->quantity = $quantity;
                    $cartItem->save();
                }
                TransactionDetail::create([
                    'transactions_id' => $transaction->id,
                    'products_id' => $cartItem->product->id,
                    'price' => $cartItem->quantity * $cartItem->product->price,
                    'shipping_status' => 'PENDING',
                    'resi' => '',
                    'code' => $trx,
                ]);

                $product = $cartItem->product;
                $product->decrement('stock', $cartItem->quantity);
            }

            // Clear selected cart items
            Cart::whereIn('id', $selectedCartIds)->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Configuration Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone_number,
            ],
            'enable_payments' => [
                'credit_card', 'gopay', 'permata_va', 'bank_transfer'
            ],
            'credit_card' => [
                'secure' => true
            ],
            'item_details' => $cartItems->map(function ($cartItem) {
                return [
                    'id' => $cartItem->product->id,
                    'price' => $cartItem->product->price,
                    'quantity' => $cartItem->quantity,
                    'name' => $cartItem->product->name,
                ];
            })->toArray(),
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('frontend.checkout-success', compact('snapToken', 'totalPrice'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function notificationHandler(Request $request)
    {
        // Configuration midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        // Extract the transaction code from the order_id
        $code = explode('-', $orderId)[1];

        // Find transaction by code
        // Update transaction status
        $transactionRecord = Transaction::where('order_id', $orderId)->first();

        if ($transactionRecord) {
            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $transactionRecord->status = 'pending';
                    } else {
                        $transactionRecord->status = 'success';
                    }
                }
            } elseif ($transaction == 'settlement') {
                $transactionRecord->status = 'success';
            } elseif ($transaction == 'pending') {
                $transactionRecord->status = 'pending';
            } elseif ($transaction == 'deny') {
                $transactionRecord->status = 'failed';
            } elseif ($transaction == 'expire') {
                $transactionRecord->status = 'expired';
            } elseif ($transaction == 'cancel') {
                $transactionRecord->status = 'failed';
            }

            $transactionRecord->save();
        }

        // Save transaction
        return response()->json([
            'message' => 'Notification handled successfully'
        ]);
    }

    public function checkoutSuccess()
    {
        return view('frontend.checkout-success');
    }
}
