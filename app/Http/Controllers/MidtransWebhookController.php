<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransWebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('===== CALLBACK MASUK =====');
        Log::info($request->all());

        try {

            $payload = $request->all();

            $orderId = $payload['order_id'] ?? null;
            $transactionStatus = $payload['transaction_status'] ?? null;
            $fraudStatus = $payload['fraud_status'] ?? null;

            if (!$orderId) {
                return response()->json(['message'=>'Invalid payload'],400);
            }

            $transaction = Transaction::with('event')
                ->where('order_id',$orderId)
                ->first();

            if (!$transaction) {
                Log::warning('Transaction tidak ditemukan : '.$orderId);
                return response()->json(['message'=>'Transaction not found'],404);
            }

            Log::info('Transaction ditemukan');

            if ($transactionStatus == 'settlement') {
                $transaction->status = 'settlement';
            }

            $transaction->save();

            Log::info('Transaction berhasil disimpan');

            return response()->json([
                'message'=>'OK'
            ]);

        } catch (\Throwable $e) {

            Log::error($e);

            return response()->json([
                'message'=>$e->getMessage()
            ],500);
        }
    }
}