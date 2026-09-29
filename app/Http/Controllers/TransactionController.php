<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function create($id)
    {
        $product = Product::with('game')->findOrFail($id);
        return view('checkout', compact('product'));
    }

    public function process(Request $request)
    {
        // Validate base fields
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|string|min:3|max:50',
            'server' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1|max:99',
            'payment' => 'required|in:DANA,OVO,GOPAY,QRIS,SHOPEEPAY,TRANSFER,INDOMART,ALFAMART'
        ]);

        // Validate phone number for e-wallet methods
        $ewallets = ['DANA', 'OVO', 'GOPAY', 'SHOPEEPAY'];
        
        if (in_array($validated['payment'], $ewallets)) {
            $request->validate([
                'phone_number' => 'required|regex:/^62\d{9,12}$/'
            ], [
                'phone_number.required' => 'Nomor HP diperlukan untuk pembayaran ' . $validated['payment'],
                'phone_number.regex' => 'Format nomor HP tidak valid'
            ]);
        }

        // Get product details for total price calculation
        $product = Product::findOrFail($validated['product_id']);
        $totalPrice = $product->price * $validated['quantity'];

        // Create transaction with pending status
        $trx = Transaction::create([
            'product_id' => $validated['product_id'],
            'user_id' => $validated['user_id'],
            'server' => $validated['server'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'phone_number' => $request->phone_number ?? null,
            'payment_method' => $validated['payment'],
            'status' => 'pending'
        ]);

        // Redirect to payment processing page
        return redirect()->route('payment.processing', $trx->id);
    }

    public function paymentProcessing($id)
    {
        $transaction = Transaction::with('product.game')->findOrFail($id);
        return view('payment-processing', compact('transaction'));
    }

    public function checkPaymentStatus($id)
    {
        $transaction = Transaction::findOrFail($id);
        
        // Simulate payment confirmation (dalam production, ini akan dari webhook payment gateway)
        // Untuk demo, set ke success setelah beberapa detik
        if ($transaction->status === 'pending') {
            // Simulate pembayaran masuk setelah 5-10 detik
            $createdAt = $transaction->created_at->timestamp;
            $now = now()->timestamp;
            $elapsedSeconds = $now - $createdAt;
            
            // Ubah status ke success setelah 8 detik
            if ($elapsedSeconds >= 8) {
                $transaction->update(['status' => 'success']);
            }
        }
        
        return response()->json([
            'status' => $transaction->status,
            'transaction_id' => $transaction->id
        ]);
    }

    public function index()
    {
        $transactions = Transaction::with('product.game')->latest()->get();
        return view('transactions', compact('transactions'));
    }

    public function show($id)
    {
        $trx = Transaction::with('product.game')->findOrFail($id);
        return view('transaction-detail', compact('trx'));
    }
}