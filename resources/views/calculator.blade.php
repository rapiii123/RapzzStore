@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">
    <!-- HEADER WITH LOGO -->
    <div class="text-center mb-12">
        <a href="/" class="mb-4 flex justify-center">
            <img src="{{ asset('images/RR.png') }}" alt="Logo" class="h-36 w-auto drop-shadow-lg">
        </a>
        <h1 class="text-4xl font-bold text-white mb-4">Kalkulator Win Rate</h1>
        <p class="text-gray-300 text-center mb-2">
            Digunakan untuk menghitung total jumlah pertandingan yang harus diambil untuk mencapai
        </p>
        <p class="text-gray-300 text-center">
            target tingkat kemenangan yang diinginkan.
        </p>
    </div>

    <!-- CALCULATOR FORM -->
    <div class="bg-[#1a1f2e] rounded-lg p-8 shadow-xl">
        
        <!-- Input 1: Total Pertandingan -->
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-semibold mb-3">
                Total Pertandingan Kamu Saat Ini
            </label>
            <input 
                type="number" 
                id="totalMatches"
                placeholder="Contoh: 489"
                class="w-full bg-[#2a3142] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none transition"
            >
        </div>

        <!-- Input 2: Current Win Rate -->
        <div class="mb-6">
            <label class="block text-gray-300 text-sm font-semibold mb-3">
                Total Win Rate Kamu Saat Ini
            </label>
            <div class="flex gap-2">
                <input 
                    type="number" 
                    id="currentWR"
                    placeholder="Contoh: 62"
                    class="flex-1 bg-[#2a3142] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none transition"
                >
                <div class="bg-[#2a3142] text-white px-4 py-3 rounded border border-gray-600 flex items-center">
                    %
                </div>
            </div>
        </div>

        <!-- Input 3: Target Win Rate -->
        <div class="mb-8">
            <label class="block text-gray-300 text-sm font-semibold mb-3">
                Win Rate Total yang Kamu Inginkan
            </label>
            <div class="flex gap-2">
                <input 
                    type="number" 
                    id="targetWR"
                    placeholder="Contoh: 70"
                    class="flex-1 bg-[#2a3142] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none transition"
                >
                <div class="bg-[#2a3142] text-white px-4 py-3 rounded border border-gray-600 flex items-center">
                    %
                </div>
            </div>
        </div>

        <!-- Calculate Button -->
        <button 
            onclick="calculateWinRate()"
            class="w-full bg-yellow-400 text-black font-bold py-3 rounded-lg hover:bg-yellow-300 transition transform hover:scale-105 mb-6"
        >
            Hitung
        </button>

        <!-- Result Message -->
        <div id="resultContainer" class="hidden">
            <div class="bg-[#2a3142] border border-yellow-400 rounded-lg px-6 py-4 text-center">
                <p id="resultText" class="text-white font-bold text-lg">
                    <!-- Result will be displayed here -->
                </p>
            </div>
        </div>

    </div>

</div>

<script>
function calculateWinRate() {
    // Get input values
    const totalMatches = parseFloat(document.getElementById('totalMatches').value);
    const currentWR = parseFloat(document.getElementById('currentWR').value);
    const targetWR = parseFloat(document.getElementById('targetWR').value);

    // Validate inputs
    if (!totalMatches || !currentWR || !targetWR) {
        Swal.fire({
            icon: 'warning',
            title: 'Mohon Isi Semua Field!',
            text: 'Pastikan Anda mengisi total pertandingan, win rate saat ini, dan target win rate.',
            confirmButtonColor: '#facc15',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (totalMatches <= 0 || currentWR < 0 || currentWR > 100 || targetWR < 0 || targetWR > 100) {
        Swal.fire({
            icon: 'error',
            title: 'Nilai Tidak Valid!',
            text: 'Masukkan nilai yang benar. Total pertandingan > 0, dan win rate antara 0-100%.',
            confirmButtonColor: '#facc15',
            confirmButtonText: 'OK'
        });
        return;
    }

    if (targetWR <= currentWR) {
        Swal.fire({
            icon: 'info',
            title: 'Target WR Harus Lebih Besar!',
            text: 'Target WR harus lebih besar dari WR saat ini.',
            confirmButtonColor: '#facc15',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Convert percentages to decimal
    const currentWRDecimal = currentWR / 100;
    const targetWRDecimal = targetWR / 100;

    // Calculate wins needed using formula:
    // N = M * (Target% - Current%) / (1 - Target%)
    const winsNeeded = Math.ceil(totalMatches * (targetWRDecimal - currentWRDecimal) / (1 - targetWRDecimal));

    // Verify the calculation
    const currentWins = Math.round(totalMatches * currentWRDecimal);
    const newTotalMatches = totalMatches + winsNeeded;
    const newWins = currentWins + winsNeeded;
    const resultingWR = Math.round((newWins / newTotalMatches) * 100);

    // Display result
    const resultContainer = document.getElementById('resultContainer');
    const resultText = document.getElementById('resultText');
    resultText.innerHTML = `YOU NEED ABOUT <span class="text-yellow-400">${winsNeeded}</span> WIN WITHOUT LOSE TO GET A <span class="text-yellow-400">${resultingWR}%</span> WIN RATE.`;
    resultContainer.classList.remove('hidden');
}

// Allow Enter key to calculate
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('#totalMatches, #currentWR, #targetWR');
    inputs.forEach(input => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                calculateWinRate();
            }
        });
    });
});
</script>

@endsection