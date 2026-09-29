@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- MAIN CONTENT -->
        <div class="lg:col-span-2">
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-8 rounded-xl shadow-lg border border-gray-700">

                <!-- STATUS -->
                <div class="text-center mb-8 pb-6 border-b border-gray-600">
                    @if($trx->status == 'success')
                        <div class="inline-block bg-green-500 bg-opacity-20 rounded-full p-4 mb-4">
                            <span class="text-4xl">✔</span>
                        </div>
                        <h2 class="text-3xl font-bold text-green-400">Transaksi Berhasil</h2>
                        <p class="text-gray-400 mt-2">Terima kasih telah berbelanja</p>
                    @elseif($trx->status == 'pending')
                        <div class="inline-block bg-yellow-500 bg-opacity-20 rounded-full p-4 mb-4">
                            <span class="text-4xl">⏳</span>
                        </div>
                        <h2 class="text-3xl font-bold text-yellow-400">Sedang Diproses</h2>
                        <p class="text-gray-400 mt-2">Mohon tunggu sebentar</p>
                    @else
                        <div class="inline-block bg-red-500 bg-opacity-20 rounded-full p-4 mb-4">
                            <span class="text-4xl">✖</span>
                        </div>
                        <h2 class="text-3xl font-bold text-red-400">Transaksi Gagal</h2>
                        <p class="text-gray-400 mt-2">Silakan coba lagi</p>
                    @endif
                </div>

                <!-- GAME IMAGE -->
                <img src="{{ asset($trx->product->image) }}"
                     class="w-full h-56 object-cover rounded-lg mb-6 shadow-lg">

                <!-- DETAIL -->
                <div class="space-y-4 mb-6">

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Game</span>
                        <span class="text-white font-semibold">{{ $trx->product->game->name }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Item</span>
                        <span class="text-white font-semibold">{{ $trx->product->name }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">User ID / Username</span>
                        <span class="text-white font-semibold">{{ $trx->user_id }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Jumlah</span>
                        <span class="text-white font-semibold">x{{ $trx->quantity }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Metode Pembayaran</span>
                        <span class="text-white font-semibold">{{ $trx->payment_method }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">No. Referensi</span>
                        <span class="text-white font-semibold font-mono text-sm">#{{ $trx->id }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Waktu Transaksi</span>
                        <span class="text-white font-semibold">{{ $trx->created_at->format('H:i') }}</span>
                    </div>

                    <div class="flex justify-between p-3 bg-[#0f172a] rounded-lg">
                        <span class="text-gray-400">Tanggal Transaksi</span>
                        <span class="text-white font-semibold">{{ $trx->created_at->format('d M Y') }}</span>
                    </div>

                    <div class="flex justify-between p-4 bg-gradient-to-r from-yellow-400 to-yellow-500 rounded-lg font-bold text-black text-lg">
                        <span>Total Pembayaran</span>
                        <span>Rp {{ number_format($trx->total_price) }}</span>
                    </div>

                </div>

                <!-- ACTION BUTTONS -->
                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}"
                       class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-bold transition-colors text-center">
                       Beli Lagi
                    </a>

                    <a href="{{ route('riwayat') }}"
                       class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-black px-6 py-3 rounded-lg font-bold transition-colors text-center">
                       Riwayat Transaksi
                    </a>
                </div>

            </div>
        </div>

        <!-- RATING SECTION -->
        <div class="lg:col-span-1">
            @if($trx->status == 'success')
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700 sticky top-6">
                <h3 class="text-lg font-bold text-white mb-6 pb-4 border-b border-gray-600">⭐ BERI RATING</h3>

                <form method="POST" class="space-y-4" onsubmit="handleRatingSubmit(event)">
                    @csrf

                    <!-- STAR RATING -->
                    <div>
                        <p class="text-gray-400 text-sm mb-3">Seberapa puas Anda?</p>
                        <div class="flex justify-center gap-2" id="starRating">
                            <label class="cursor-pointer star-label" data-value="1">
                                <input type="radio" name="rating" value="1" class="hidden">
                                <span class="text-4xl transition-all text-gray-500 star-display">★</span>
                            </label>
                            <label class="cursor-pointer star-label" data-value="2">
                                <input type="radio" name="rating" value="2" class="hidden">
                                <span class="text-4xl transition-all text-gray-500 star-display">★</span>
                            </label>
                            <label class="cursor-pointer star-label" data-value="3">
                                <input type="radio" name="rating" value="3" class="hidden">
                                <span class="text-4xl transition-all text-gray-500 star-display">★</span>
                            </label>
                            <label class="cursor-pointer star-label" data-value="4">
                                <input type="radio" name="rating" value="4" class="hidden">
                                <span class="text-4xl transition-all text-gray-500 star-display">★</span>
                            </label>
                            <label class="cursor-pointer star-label" data-value="5">
                                <input type="radio" name="rating" value="5" class="hidden">
                                <span class="text-4xl transition-all text-gray-500 star-display">★</span>
                            </label>
                        </div>
                    </div>

                    <!-- REVIEW CONTENT -->
                    <div>
                        <label class="block text-gray-400 text-sm mb-2">Review Anda</label>
                        <textarea 
                            name="review"
                            placeholder="Bagaimana pengalaman Anda? (Opsional)"
                            rows="5"
                            class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors text-sm resize-none"
                        ></textarea>
                    </div>

                    <!-- ASPECTS RATING -->
                    <div class="pt-4 border-t border-gray-600 space-y-3">
                        <p class="text-gray-400 text-sm font-semibold">Aspek Pelayanan</p>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Kecepatan</span>
                            <select name="speed_rating" class="bg-[#0f172a] text-white text-xs p-1 rounded border border-gray-600 focus:border-yellow-400">
                                <option value="">--</option>
                                <option value="1">★</option>
                                <option value="2">★★</option>
                                <option value="3">★★★</option>
                                <option value="4">★★★★</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Harga</span>
                            <select name="price_rating" class="bg-[#0f172a] text-white text-xs p-1 rounded border border-gray-600 focus:border-yellow-400">
                                <option value="">--</option>
                                <option value="1">★</option>
                                <option value="2">★★</option>
                                <option value="3">★★★</option>
                                <option value="4">★★★★</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>

                        <div class="flex justify-between items-center">
                            <span class="text-gray-400 text-xs">Kualitas</span>
                            <select name="quality_rating" class="bg-[#0f172a] text-white text-xs p-1 rounded border border-gray-600 focus:border-yellow-400">
                                <option value="">--</option>
                                <option value="1">★</option>
                                <option value="2">★★</option>
                                <option value="3">★★★</option>
                                <option value="4">★★★★</option>
                                <option value="5">★★★★★</option>
                            </select>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-black px-4 py-3 rounded-lg font-bold transition-all duration-200 mt-4"
                    >
                        Kirim Rating
                    </button>
                </form>

                <!-- RATING INFO -->
                <div class="mt-6 pt-6 border-t border-gray-600">
                    <p class="text-gray-400 text-xs text-center">
                        💡 Rating Anda membantu kami meningkatkan kualitas layanan
                    </p>
                </div>
            </div>
            @else
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700">
                <p class="text-yellow-400 text-center font-semibold">⏳ Rating tersedia setelah transaksi berhasil</p>
            </div>
            @endif
        </div>

    </div>

</div>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#22c55e',
            background: '#1e293b',
            color: '#fff',
            timer: 1800, 
        });
    });
</script>
@endif

<script>
// Star Rating Handler
document.addEventListener('DOMContentLoaded', function() {
    const starLabels = document.querySelectorAll('.star-label');
    const starRating = document.getElementById('starRating');

    function updateStars(rating) {
        starLabels.forEach((label, index) => {
            const starDisplay = label.querySelector('.star-display');
            const radioInput = label.querySelector('input[type="radio"]');
            
            if (index < rating) {
                starDisplay.classList.remove('text-gray-500');
                starDisplay.classList.add('text-yellow-400');
                radioInput.checked = true;
            } else {
                starDisplay.classList.remove('text-yellow-400');
                starDisplay.classList.add('text-gray-500');
            }
        });
    }

    // Click handler
    starLabels.forEach((label) => {
        label.addEventListener('click', function() {
            const rating = parseInt(this.getAttribute('data-value'));
            updateStars(rating);
        });

        // Hover effect preview
        label.addEventListener('mouseenter', function() {
            const rating = parseInt(this.getAttribute('data-value'));
            const currentRating = document.querySelector('input[name="rating"]:checked');
            const currentValue = currentRating ? parseInt(currentRating.value) : 0;
            
            starLabels.forEach((lbl, index) => {
                const starDisplay = lbl.querySelector('.star-display');
                if (index < rating) {
                    starDisplay.classList.add('text-yellow-400');
                    starDisplay.classList.remove('text-gray-500');
                } else {
                    starDisplay.classList.remove('text-yellow-400');
                    starDisplay.classList.add('text-gray-500');
                }
            });
        });
    });

    // Reset hover on mouse leave
    starRating.addEventListener('mouseleave', function() {
        const currentRating = document.querySelector('input[name="rating"]:checked');
        const rating = currentRating ? parseInt(currentRating.value) : 0;
        updateStars(rating);
    });
});

function handleRatingSubmit(event) {
    event.preventDefault();
    const rating = document.querySelector('input[name="rating"]:checked');
    
    if (!rating) {
        Swal.fire({
            icon: 'warning',
            title: 'Perhatian!',
            text: 'Silakan pilih rating terlebih dahulu',
            confirmButtonColor: '#eab308',
            background: '#1e293b',
            color: '#fff',
        });
        return;
    }

    Swal.fire({
        icon: 'success',
        title: 'Terima Kasih!',
        text: 'Rating Anda telah disimpan. Terima kasih atas masukan Anda!',
        confirmButtonColor: '#22c55e',
        background: '#1e293b',
        color: '#fff',
        timer: 1500,
    });
}
</script>

@endsection