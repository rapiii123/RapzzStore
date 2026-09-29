@extends('layouts.app')

@section('content')

<div class="max-w-5xl">
    <h2 class="text-3xl font-bold mb-8">Pusat Dukungan</h2>

    <!-- Contact Methods -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700 text-center hover:border-yellow-400 transition-colors">
            <h3 class="text-lg font-bold text-white mb-2">WhatsApp</h3>
            <p class="text-gray-400 text-sm mb-4">Chat langsung dengan tim kami</p>
            <p class="text-yellow-400 font-semibold">0852-1592-6671</p>
            <button class="mt-4 w-full bg-yellow-400 text-black px-4 py-2 rounded font-semibold hover:bg-yellow-500 transition-colors">
                Hubungi Sekarang
            </button>
        </div>

        <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700 text-center hover:border-yellow-400 transition-colors">
            <h3 class="text-lg font-bold text-white mb-2">Email</h3>
            <p class="text-gray-400 text-sm mb-4">Balas dalam 24 jam</p>
            <p class="text-yellow-400 font-semibold text-sm">RapzzstoreSupport@gmail.com</p>
            <button class="mt-4 w-full bg-yellow-400 text-black px-4 py-2 rounded font-semibold hover:bg-yellow-500 transition-colors">
                Kirim Email
            </button>
        </div>

        <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700 text-center hover:border-yellow-400 transition-colors">
            <h3 class="text-lg font-bold text-white mb-2">Jam Operasional</h3>
            <p class="text-gray-400 text-sm mb-4">Senin - Minggu</p>
            <p class="text-yellow-400 font-semibold">08:00 - 22:00 WIB</p>
            <button class="mt-4 w-full bg-gray-700 text-white px-4 py-2 rounded font-semibold hover:bg-gray-600 transition-colors">
                Jadwal Lengkap
            </button>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-8 rounded-xl shadow-lg border border-gray-700 mb-8">
        <h3 class="text-2xl font-bold text-white mb-6 pb-4 border-b border-gray-600">Pertanyaan Umum (FAQ)</h3>
        
        <div class="space-y-4">
            <details class="group">
                <summary class="flex justify-between items-center p-4 bg-[#0f172a] rounded-lg cursor-pointer hover:bg-gray-800 transition-colors">
                    <span class="text-white font-semibold">Bagaimana cara top up saldo?</span>
                    <span class="text-yellow-400 font-bold group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <div class="p-4 text-gray-300 bg-[#0f172a] mt-2 rounded-lg border-l-4 border-yellow-400">
                    <p>Anda dapat melakukan top up saldo melalui beberapa metode pembayaran yang tersedia di halaman top up. Proses biasanya selesai dalam 1-5 menit.</p>
                </div>
            </details>

            <details class="group">
                <summary class="flex justify-between items-center p-4 bg-[#0f172a] rounded-lg cursor-pointer hover:bg-gray-800 transition-colors">
                    <span class="text-white font-semibold">Apakah saldo saya aman?</span>
                    <span class="text-yellow-400 font-bold group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <div class="p-4 text-gray-300 bg-[#0f172a] mt-2 rounded-lg border-l-4 border-yellow-400">
                    <p>Ya, saldo Anda dilindungi dengan enkripsi tingkat bank. Kami menggunakan teknologi terkini untuk menjaga keamanan data Anda.</p>
                </div>
            </details>

            <details class="group">
                <summary class="flex justify-between items-center p-4 bg-[#0f172a] rounded-lg cursor-pointer hover:bg-gray-800 transition-colors">
                    <span class="text-white font-semibold">Berapa lama proses refund?</span>
                    <span class="text-yellow-400 font-bold group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <div class="p-4 text-gray-300 bg-[#0f172a] mt-2 rounded-lg border-l-4 border-yellow-400">
                    <p>Proses refund umumnya membutuhkan waktu 3-7 hari kerja tergantung metode pembayaran yang digunakan.</p>
                </div>
            </details>

            <details class="group">
                <summary class="flex justify-between items-center p-4 bg-[#0f172a] rounded-lg cursor-pointer hover:bg-gray-800 transition-colors">
                    <span class="text-white font-semibold">Bagaimana cara menghubungi customer service?</span>
                    <span class="text-yellow-400 font-bold group-open:rotate-180 transition-transform">▼</span>
                </summary>
                <div class="p-4 text-gray-300 bg-[#0f172a] mt-2 rounded-lg border-l-4 border-yellow-400">
                    <p>Anda dapat menghubungi kami melalui WhatsApp, Email, atau mengisi form di bagian bawah halaman ini. Tim kami siap membantu Anda 24/7.</p>
                </div>
            </details>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Support Form -->
        <div class="lg:col-span-2">
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-2xl font-bold text-white mb-6 pb-4 border-b border-gray-600"> Kirim Kendala</h3>
                
                <form class="space-y-5">
                    <div>
                        <label class="block text-white font-semibold mb-2">Nama Lengkap</label>
                        <input 
                            type="text" 
                            placeholder="Masukkan nama Anda"
                            class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors"
                        >
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2">Email</label>
                        <input 
                            type="email" 
                            placeholder="email@example.com"
                            class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors"
                        >
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2">Kategori Masalah</label>
                        <select class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors">
                            <option>Pilih kategori...</option>
                            <option>Pertanyaan Umum</option>
                            <option>Laporan Bug</option>
                            <option>Keluhan</option>
                            <option>Saran & Feedback</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2">Subjek</label>
                        <input 
                            type="text" 
                            placeholder="Ringkas masalah Anda"
                            class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors"
                        >
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2">Pesan Anda</label>
                        <textarea 
                            placeholder="Jelaskan masalah Anda secara detail..."
                            rows="6"
                            class="w-full p-3 rounded-lg bg-[#0f172a] text-white border border-gray-600 focus:border-yellow-400 focus:outline-none transition-colors resize-none"
                        ></textarea>
                    </div>

                    <button 
                        type="submit"
                        class="w-full bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600 text-black px-6 py-3 rounded-lg font-bold transition-all duration-200 shadow-lg"
                    >
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <!-- Ticket History -->
        <div>
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-xl font-bold text-white mb-6 pb-4 border-b border-gray-600">🎫 Tiket Terbaru</h3>
                
                <div class="space-y-3">
                    <div class="p-4 bg-[#0f172a] rounded-lg border-l-4 border-green-400">
                        <div class="flex justify-between items-start mb-2">
                            <p class="font-semibold text-white text-sm">Topup Error</p>
                            <span class="text-green-400 text-xs font-bold">✓ SELESAI</span>
                        </div>
                        <p class="text-gray-400 text-xs">28 Apr 2026</p>
                    </div>

                    <div class="p-4 bg-[#0f172a] rounded-lg border-l-4 border-blue-400">
                        <div class="flex justify-between items-start mb-2">
                            <p class="font-semibold text-white text-sm">Password Lupa</p>
                            <span class="text-blue-400 text-xs font-bold">⧖ DITINJAU</span>
                        </div>
                        <p class="text-gray-400 text-xs">25 Apr 2026</p>
                    </div>

                    <div class="p-4 bg-[#0f172a] rounded-lg border-l-4 border-yellow-400">
                        <div class="flex justify-between items-start mb-2">
                            <p class="font-semibold text-white text-sm">Pertanyaan Fitur</p>
                            <span class="text-yellow-400 text-xs font-bold">⟳ MENUNGGU</span>
                        </div>
                        <p class="text-gray-400 text-xs">20 Apr 2026</p>
                    </div>
                </div>

                <button class="w-full mt-6 bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-semibold transition-colors text-sm">
                    Lihat Semua Tiket
                </button>
            </div>

            <!-- Support Team -->
            <div class="bg-gradient-to-br from-[#1e293b] to-[#0f172a] p-6 rounded-xl shadow-lg border border-gray-700 mt-6">
                <h3 class="text-lg font-bold text-white mb-4 pb-3 border-b border-gray-600">👥 Tim Support</h3>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center font-bold text-black">A</div>
                        <div>
                            <p class="text-white font-semibold">Ahmad</p>
                            <p class="text-gray-400 text-xs">Manager Support</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center font-bold text-black">S</div>
                        <div>
                            <p class="text-white font-semibold">Siti</p>
                            <p class="text-gray-400 text-xs">Customer Service</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-purple-400 rounded-full flex items-center justify-center font-bold text-black">B</div>
                        <div>
                            <p class="text-white font-semibold">Budi</p>
                            <p class="text-gray-400 text-xs">Technical Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection