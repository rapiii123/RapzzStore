@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-4">
        
        <!-- Progress Timeline -->
        <div class="bg-[#1e293b] p-6 rounded-xl mb-6">
            <p class="text-sm font-semibold text-gray-300 mb-4">Progress Transaksi</p>
            
            <!-- Timeline -->
            <div class="flex items-center gap-4 mb-8">
                <!-- Step 1: Transaksi Dibuat -->
                <div class="flex flex-col items-center flex-1">
                    <div class="w-12 h-12 rounded-full bg-green-500 flex items-center justify-center border-4 border-green-500 mb-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold text-green-400">Transaksi Dibuat</p>
                </div>

                <!-- Line -->
                <div class="flex-1 h-1 {{ $transaction->status !== 'pending' ? 'bg-green-500' : 'bg-gray-600' }} mb-6"></div>

                <!-- Step 2: Pembayaran -->
                <div class="flex flex-col items-center flex-1">
                    <div class="w-12 h-12 rounded-full {{ $transaction->status !== 'pending' ? 'bg-green-500' : 'bg-yellow-500' }} flex items-center justify-center border-4 {{ $transaction->status !== 'pending' ? 'border-green-500' : 'border-yellow-500' }} mb-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold {{ $transaction->status !== 'pending' ? 'text-green-400' : 'text-yellow-400' }}">Pembayaran</p>
                </div>

                <!-- Line -->
                <div class="flex-1 h-1 {{ $transaction->status === 'success' ? 'bg-green-500' : 'bg-gray-600' }} mb-6"></div>

                <!-- Step 3: Sedang Di Proses -->
                <div class="flex flex-col items-center flex-1">
                    <div class="w-12 h-12 rounded-full {{ $transaction->status === 'success' ? 'bg-green-500' : 'bg-gray-700' }} flex items-center justify-center border-4 {{ $transaction->status === 'success' ? 'border-green-500' : 'border-gray-600' }} mb-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.707 6.707a1 1 0 010 1.414L5.414 9l1.293 1.293a1 1 0 01-1.414 1.414l-2-2a1 1 0 010-1.414l2-2a1 1 0 011.414 0zm7.586 0a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-2 2a1 1 0 11-1.414-1.414L14.586 9l-1.293-1.293a1 1 0 010-1.414zM9 11a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold {{ $transaction->status === 'success' ? 'text-green-400' : 'text-gray-400' }}">Sedang Di Proses</p>
                </div>

                <!-- Line -->
                <div class="flex-1 h-1 {{ $transaction->status === 'success' ? 'bg-green-500' : 'bg-gray-600' }} mb-6"></div>

                <!-- Step 4: Transaksi Selesai -->
                <div class="flex flex-col items-center flex-1">
                    <div class="w-12 h-12 rounded-full {{ $transaction->status === 'success' ? 'bg-green-500' : 'bg-gray-700' }} flex items-center justify-center border-4 {{ $transaction->status === 'success' ? 'border-green-500' : 'border-gray-600' }} mb-2">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="text-xs font-semibold {{ $transaction->status === 'success' ? 'text-green-400' : 'text-gray-400' }}">Transaksi Selesai</p>
                </div>
            </div>

            <!-- Countdown Timer (hanya untuk pending) -->
            @if($transaction->status === 'pending')
            <div class="bg-red-900/30 border border-red-700 rounded p-3 text-center">
                <p class="text-sm font-semibold text-red-300" id="countdown">2 Jam 59 Menit 59 Detik</p>
            </div>
            @endif
        </div>

        <!-- Product & Payment Info -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Product Info -->
            <div class="bg-[#1e293b] p-6 rounded-xl">
                <h3 class="text-lg font-bold mb-4">Informasi Akun</h3>
                
                <div class="flex gap-4 mb-4">
                    <img src="{{ asset($transaction->product->image) }}" alt="{{ $transaction->product->name }}" class="w-20 h-20 rounded object-cover">
                    <div class="flex-1">
                        <p class="font-semibold">{{ $transaction->product->name }}</p>
                        <p class="text-gray-400 text-sm">{{ $transaction->product->game->name }}</p>
                    </div>
                </div>

                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Nickname:</span>
                        <span class="font-semibold">{{ $transaction->user_id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">ID:</span>
                        <span class="font-semibold">{{ $transaction->user_id }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Server:</span>
                        <span class="font-semibold">{{ $transaction->server ?? '2570' }}</span>
                    </div>
                </div>

                <div class="border-t border-gray-600 my-4"></div>

                <p class="text-xs text-yellow-400 font-semibold mb-2">Rincian Pembayaran</p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Harga:</span>
                        <span>Rp {{ number_format($transaction->product->price) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jumlah:</span>
                        <span>{{ $transaction->quantity ?? 1 }}x</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Subtotal:</span>
                        <span>Rp {{ number_format($transaction->total_price ?? $transaction->product->price) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Biaya:</span>
                        <span>Rp 0</span>
                    </div>
                </div>

                <div class="border-t border-gray-600 my-4"></div>

                <div class="flex justify-between font-bold text-lg">
                    <span>Total Pembayaran:</span>
                    <span class="text-yellow-400">Rp {{ number_format($transaction->total_price ?? $transaction->product->price) }}</span>
                </div>
            </div>

            <!-- Payment Method Info -->
            <div class="bg-[#1e293b] p-6 rounded-xl">
                <h3 class="text-lg font-bold mb-4">Metode Pembayaran</h3>
                
                <div class="bg-[#2a2f3d] p-4 rounded mb-4">
                    <p class="text-gray-400 text-sm mb-1">Metode Pembayaran</p>
                    <p class="font-semibold text-lg">{{ $transaction->payment_method }} (All Payment)</p>
                </div>

                <!-- QRIS Display (if QRIS payment) -->
                @if($transaction->payment_method === 'QRIS')
                <div class="bg-white p-4 rounded flex items-center justify-center mx-auto mb-4">
                    <img src="{{ asset('qris/merchant-qris.png') }}" alt="QRIS Payment" id="qrisImage" class="w-full max-w-xs h-auto object-contain">
                </div>
                <button type="button" id="downloadQrBtn" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 rounded transition text-sm">
                    Unduh Kode QR
                </button>
                @endif

                <!-- Payment Status -->
                <div class="border-t border-gray-600 my-4"></div>
                <div class="space-y-2">
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded-full {{ $transaction->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }}"></div>
                        <span class="text-sm">
                            Status Pembayaran: 
                            <span class="font-semibold {{ $transaction->status === 'pending' ? 'text-yellow-400' : 'text-green-400' }}">
                                {{ $transaction->status === 'pending' ? 'UNPAID' : 'PAID' }}
                            </span>
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded-full {{ $transaction->status === 'pending' ? 'bg-yellow-500' : 'bg-green-500' }}"></div>
                        <span class="text-sm">
                            Status Transaksi: 
                            <span class="font-semibold {{ $transaction->status === 'pending' ? 'text-yellow-400' : 'text-green-400' }}">
                                {{ strtoupper($transaction->status) }}
                            </span>
                        </span>
                    </div>
                </div>

                @if($transaction->status === 'pending')
                <div class="mt-4 p-3 rounded bg-blue-900/30 border border-blue-700">
                    <p class="text-xs text-blue-300">
                        Pesanan Anda sedang diproses. Mohon tunggu!
                    </p>
                </div>
                @endif
            </div>
        
        </div>

        </div>

    </div>
</div>

<script>
// Download QR Code
const downloadBtn = document.getElementById('downloadQrBtn');
if (downloadBtn) {
    downloadBtn.addEventListener('click', function() {
        const qrisImage = document.getElementById('qrisImage');
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const img = new Image();
        
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img, 0, 0);
            
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'QRIS-RAPZ-' + new Date().getTime() + '.png';
            link.click();
        };
        
        img.src = qrisImage.src;
    });
}

// Countdown Timer
function startCountdown() {
    let timeRemaining = 2 * 3600 + 59 * 60 + 59; // 2 jam 59 menit 59 detik
    
    const updateCountdown = () => {
        const hours = Math.floor(timeRemaining / 3600);
        const minutes = Math.floor((timeRemaining % 3600) / 60);
        const seconds = timeRemaining % 60;
        
        document.getElementById('countdown').textContent = 
            hours + ' Jam ' + String(minutes).padStart(2, '0') + ' Menit ' + String(seconds).padStart(2, '0') + ' Detik';
        
        if (timeRemaining <= 0) {
            clearInterval(interval);
            document.getElementById('countdown').textContent = 'Waktu Habis!';
        } else {
            timeRemaining--;
        }
    };
    
    updateCountdown();
    const interval = setInterval(updateCountdown, 1000);
}

// Check payment status setiap 5 detik
function checkPaymentStatus() {
    setInterval(() => {
        fetch('{{ route("payment.check", $transaction->id) }}')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Pembayaran berhasil!
                    Swal.fire({
                        title: 'Pembayaran Berhasil!',
                        text: 'Pesanan Anda sedang diproses',
                        icon: 'success',
                        background: '#1e293b',
                        color: '#fff',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    setTimeout(() => {
                        window.location.href = '{{ route("transaction.show", $transaction->id) }}';
                    }, 2000);
                }
            });
    }, 5000);
}

// Start countdown timer
@if($transaction->status === 'pending')
    startCountdown();
    checkPaymentStatus();
@else
    // Redirect langsung jika sudah paid
    setTimeout(() => {
        window.location.href = '{{ route("transaction.show", $transaction->id) }}';
    }, 2000);
@endif
</script>

@endsection
