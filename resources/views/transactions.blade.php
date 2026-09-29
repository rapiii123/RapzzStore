@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <h2 class="text-2xl font-bold mb-6">RIWAYAT TRANSAKSI</h2>

    @if($transactions->isEmpty())
        <p class="text-gray-400">Belum ada transaksi nih ~</p>
    @endif

    <div class="space-y-4">

        @foreach($transactions as $trx)
        <div class="bg-[#1e293b] p-4 rounded-xl flex items-center gap-4 shadow-md hover:shadow-lg transition"

            <!-- IMAGE -->
            <img src="{{ asset($trx->product->image) }}"
                 class="w-20 h-20 object-cover rounded-lg">

            <!-- INFO -->
            <div class="flex-1">
                <h3 class="font-bold text-lg">
                    {{ $trx->product->name }} ({{ $trx->quantity }}x)
                </h3>

                <p class="text-gray-400 text-sm">
                    Game: {{ $trx->product->game->name }}
                </p>

                <p class="text-yellow-400 font-semibold">
                    Rp {{ number_format($trx->total_price) }}
                </p>

                <p class="text-xs text-gray-500">
                    ID: {{ $trx->user_id }} | {{ $trx->created_at->diffForHumans() }}
                </p>

                <!-- PAYMENT -->
                @php 
                $colors = [
                    'DANA' => 'bg-blue-500',
                    'OVO' => 'bg-purple-500',
                    'GOPAY' => 'bg-green-500',
                    'QRIS' => 'bg-red-500',
                    'SHOPEEPAY' => 'bg-orange-500'
                ];
                $color = $colors[$trx->payment_method] ?? 'bg-gray-500';
                @endphp

                <span class="{{ $color }} px-2 py-1 rounded text-xs">
                    {{ $trx->payment_method }}
                </span>
            </div>

            <!-- STATUS -->
            <div>
                @if($trx->status == 'success')
                    <span class="bg-green-500/20 text-green-400 px-3 py-1 rounded text-sm font-semibold">✔ Success</span>
                @elseif($trx->status == 'pending')
                    <span class="bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded text-sm font-semibold">⏳ Pending</span>
                @elseif($trx->status == 'failed')
                    <span class="bg-red-500/20 text-red-400 px-3 py-1 rounded text-sm font-semibold">❌ Failed</span>
                @else
                    <span class="bg-gray-500/20 text-gray-400 px-3 py-1 rounded text-sm font-semibold">❓ Unknown</span>
                @endif
            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection