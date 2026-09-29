<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RapzzStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body {
            width: 100%;
            height: 100%;
        }

        body {
            background: linear-gradient(-45deg, #1a1f3a, #0f172a, #1e1b4b, #0d1b2a);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            position: relative;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Animated Blobs */
        .blob-1 {
            position: fixed;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle at 30% 30%, rgba(250, 204, 21, 0.15), transparent 70%);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            top: -100px;
            right: -50px;
            animation: blobMove1 8s ease-in-out infinite;
            z-index: 1;
            filter: blur(40px);
        }

        .blob-2 {
            position: fixed;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle at 30% 30%, rgba(34, 197, 94, 0.1), transparent 70%);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            bottom: -80px;
            left: 10%;
            animation: blobMove2 10s ease-in-out infinite;
            z-index: 1;
            filter: blur(40px);
        }

        .blob-3 {
            position: fixed;
            width: 280px;
            height: 280px;
            background: radial-gradient(circle at 30% 30%, rgba(59, 130, 246, 0.1), transparent 70%);
            border-radius: 30% 70% 40% 60% / 30% 60% 50% 70%;
            bottom: 200px;
            right: 5%;
            animation: blobMove3 12s ease-in-out infinite;
            z-index: 1;
            filter: blur(40px);
        }

        @keyframes blobMove1 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(30px, -30px) rotate(90deg); }
            50% { transform: translate(-20px, 20px) rotate(180deg); }
            75% { transform: translate(20px, 30px) rotate(270deg); }
        }

        @keyframes blobMove2 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(-40px, 40px) rotate(90deg); }
            50% { transform: translate(30px, -20px) rotate(180deg); }
            75% { transform: translate(-30px, -40px) rotate(270deg); }
        }

        @keyframes blobMove3 {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            25% { transform: translate(20px, 50px) rotate(90deg); }
            50% { transform: translate(-30px, -30px) rotate(180deg); }
            75% { transform: translate(40px, -20px) rotate(270deg); }
        }

        /* Glowing Lines */
        .glow-circle {
            position: fixed;
            border: 1px solid rgba(250, 204, 21, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .glow-circle-1 {
            width: 400px;
            height: 400px;
            top: -100px;
            left: 5%;
            animation: rotate 20s linear infinite;
        }

        .glow-circle-2 {
            width: 300px;
            height: 300px;
            bottom: 10%;
            right: 10%;
            animation: rotate 25s linear infinite reverse;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Floating particles */
        .particle-float {
            position: fixed;
            width: 4px;
            height: 4px;
            background: rgba(250, 204, 21, 0.4);
            border-radius: 50%;
            z-index: 1;
            animation: float-up 6s infinite;
        }

        .particle-float:nth-child(1) { left: 10%; top: 80%; animation-delay: 0s; }
        .particle-float:nth-child(2) { left: 20%; top: 70%; animation-delay: 1s; }
        .particle-float:nth-child(3) { left: 30%; top: 75%; animation-delay: 2s; }
        .particle-float:nth-child(4) { right: 15%; top: 85%; animation-delay: 0.5s; }
        .particle-float:nth-child(5) { right: 25%; top: 80%; animation-delay: 1.5s; }

        @keyframes float-up {
            0% { 
                opacity: 0;
                transform: translateY(0px);
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                transform: translateY(-100vh);
            }
        }

        /* Navbar styling */
        .navbar-backdrop {
            backdrop-filter: blur(10px);
            background: rgba(2, 6, 23, 0.7);
            border-bottom: 1px solid rgba(250, 204, 21, 0.1);
        }

        /* Content layering */
        #mainContent {
            position: relative;
            z-index: 10;
        }
    </style>
</head>

<body class="text-white">

<!-- Animated Background Elements -->
<div class="blob-1"></div>
<div class="blob-2"></div>
<div class="blob-3"></div>

<div class="glow-circle glow-circle-1"></div>
<div class="glow-circle glow-circle-2"></div>

<div class="particle-float"></div>
<div class="particle-float"></div>
<div class="particle-float"></div>
<div class="particle-float"></div>
<div class="particle-float"></div>

<!-- NAVBAR STICKY -->
<div class="sticky top-0 z-40 navbar-backdrop">
    
    <!-- Top Bar -->
    <div class="px-6 py-2 flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-3">

            <!-- HAMBURGER -->
            <button onclick="toggleSidebar()" class="text-xl hover:text-yellow-400 transition">
                ☰
            </button>

            <!-- BRAND -->
            <div>
                <a href="/" class="text-yellow-400 font-extrabold text-lg leading-none drop-shadow-[0_0_6px_rgba(250,204,21,0.5)]">
                    RapzzStore
                </a>
                <p class="text-xs text-gray-400 leading-tight">
                    Top Up Game Murah & Cepat ⚡
                </p>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex items-center gap-2">
            <a href="{{ route('sign-in') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-1 px-4 text-sm rounded-lg transition">
                Masuk
            </a>
            <a href="{{ route('sign-up') }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-1 px-4 text-sm rounded-lg transition">
                Daftar
            </a>
        </div>

    </div>

    <!-- Search Bar -->
    <div class="px-6 pb-2">
        <form method="GET" action="{{ route('dashboard') }}" class="w-full">
            <input 
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari game..."
                class="w-full px-3 py-1.5 rounded bg-[#1e293b] text-sm text-white outline-none focus:ring-2 focus:ring-yellow-400 transition"
            >
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SIDEBAR (HIDDEN DEFAULT) -->
<div id="sidebar"
class="fixed top-0 left-0 h-full w-64 bg-[#020617] p-5 transform -translate-x-full transition duration-300 ease-in-out z-50"

    @include('layouts.sidebar')

</div>

<!-- OVERLAY -->
<div id="overlay"
onclick="toggleSidebar()"
class="fixed inset-0 backdrop-blur-sm bg-black/40 opacity-0 pointer-events-none transition duration-300 z-40">
</div>

<!-- CONTENT -->
<div id="mainContent" class="p-6 transition duration-300">
    @yield('content')
</div>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const main = document.getElementById('mainContent');

    const isOpen = !sidebar.classList.contains('-translate-x-full');

    if (isOpen) {
        // CLOSE
        sidebar.classList.add('-translate-x-full');

        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0', 'pointer-events-none');

        main.classList.remove('blur-sm', 'scale-95');
    } else {
        // OPEN
        sidebar.classList.remove('-translate-x-full');

        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');

        main.classList.add('blur-sm', 'scale-95');
    }
}
</script>

<!-- FOOTER -->
<footer class="bg-[#1a1f2e] border-t border-white/10 mt-16">
    <div class="max-w-7xl mx-auto px-6 py-12">
        
        <!-- FOOTER CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            
            <!-- LEFT: BRAND & DESCRIPTION -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <h3 class="text-yellow-400 font-extrabold text-3xl">RapzzStore</h3>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Tempat top up game termurah, tercepat, dan terpercaya di Indonesia. Proses Otomatis membuat Anda betah Top Up disini. Tersedia berbagai macam pembayaran Transfer Bank, E-Wallet, dan Scan QR yg pasti memudahkan Anda untuk bertransaksi.
                </p>
            </div>

            <!-- MIDDLE-LEFT: PETA SITUS -->
            <div>
                <h4 class="text-white font-bold mb-4 text-sm">HALAMAN</h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calculator') }}#orders" class="text-gray-400 hover:text-yellow-400 transition">
                            Kalkulator ML
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cekpesanan') }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Cek Pesanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('riwayat') }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Riwayat TopUp
                        </a>
                    </li>
                </ul>
            </div>

            <!-- MIDDLE-RIGHT: TOP UP LAINNYA -->
            <div>
                <h4 class="text-white font-bold mb-4 text-sm">TOP UP LAINNYA</h4>
                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('dashboard', ['category' => 'moba']) }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Mobile Legends
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard', ['category' => 'fps']) }}" class="text-gray-400 hover:text-yellow-400 transition">
                            PUBG Mobile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard', ['category' => 'fps']) }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Free Fire
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard', ['category' => 'rpg']) }}" class="text-gray-400 hover:text-yellow-400 transition">
                            Genshin Impact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- RIGHT: SOCIAL MEDIA -->
            <div>
                <h4 class="text-white font-bold mb-4 text-sm">SOSIAL MEDIA</h4>
                <div class="flex gap-4">
                    <!-- TikTok -->
                    <a href="https://www.tiktok.com/@rexyzzz._" target="_blank" rel="noopener noreferrer" 
                       class="group relative">
                        <div class="w-12 h-12 bg-[#0f172a] rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/social-icons/tiktok.png') }}" alt="TikTok" class="w-8 h-8">
                        </div>
                    </a>
                    
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/rfbhqi._/" target="_blank" rel="noopener noreferrer"
                       class="group relative">
                        <div class="w-12 h-12 bg-[#0f172a] rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/social-icons/ig.png') }}" alt="Instagram" class="w-8 h-8">
                        </div>
                    </a>
                    
                    <!-- WhatsApp -->
                    <a href="https://wa.me/6281234567890?text=Halo%20bang" target="_blank" rel="noopener noreferrer"
                       class="group relative block">
                        <div class="w-12 h-12 bg-[#0f172a] rounded-full flex items-center justify-center">
                            <img src="{{ asset('images/social-icons/wa.png') }}" alt="WhatsApp" class="w-8 h-8">
                        </div>
                    </a>
                </div>
            </div>

        </div>

        <!-- DIVIDER -->
        <hr class="border-gray-700 mb-6">

        <!-- FOOTER BOTTOM -->
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>Copyright © 2026 RAPZZSTORE. All Rights Reserved</p>
            <a href="{{ route('terms') }}" class="text-yellow-400 hover:text-yellow-300 transition">
                Syarat & Ketentuan Pengguna
            </a>
        </div>

    </div>
</footer>

</body>
</html>