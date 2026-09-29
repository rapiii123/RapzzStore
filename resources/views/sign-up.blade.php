@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto py-12 px-4">
    <div class="bg-[#2a2f3d] rounded-xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Daftar Akun</h2>
            <a href="/" class="text-white text-2xl hover:text-gray-300">✕</a>
        </div>
        <p class="text-gray-300 mb-8">Masukkan informasi pendaftaran yang valid.</p>

        <form action="{{ route('sign-up') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nama Lengkap -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Nama lengkap</label>
                <input type="text" name="name" placeholder="Nama lengkap" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Username -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Username</label>
                <input type="text" name="username" placeholder="Username" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('username') border-red-500 @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Alamat email</label>
                <input type="email" name="email" placeholder="Alamat email" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor WhatsApp -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Nomor whatsapp</label>
                <div class="flex gap-2">
                    <div class="flex items-center gap-2 bg-[#3a3f4d] px-3 rounded border border-gray-600">
                        <span class="text-xl">🇮🇩</span>
                        <span class="text-white">+62</span>
                        <span class="text-gray-400">⋮</span>
                    </div>
                    <input type="tel" name="phone" placeholder="812 3456 7890" class="flex-1 bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" required>
                </div>
                @error('phone')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Kata Sandi -->
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Kata sandi</label>
                    <input type="password" name="password" placeholder="Kata sandi" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('password') border-red-500 @enderror" required>
                    @error('password')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Konfirmasi kata sandi</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none" required>
                </div>
            </div>

            <!-- Terms Checkbox -->
            <div class="flex items-start gap-3">
                <input type="checkbox" id="termsCheck" name="terms" class="mt-1" required>
                <label for="termsCheck" class="text-gray-300 text-sm">
                    Saya setuju dengan <span class="text-yellow-400 font-semibold">Syarat dan Ketentuan</span> dan <span class="text-yellow-400 font-semibold">Kebijakan Pribadi.</span>
                </label>
            </div>

            <!-- reCAPTCHA -->
            <div class="bg-white p-3 rounded">
                <div style="transform:scale(0.9);transform-origin:0 0">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-lg transition">
                Daftar
            </button>
        </form>

        <!-- Login Link -->
        <p class="text-center text-gray-300 text-sm mt-4">
            Sudah memiliki akun? <a href="{{ route('sign-in') }}" class="text-yellow-400 font-semibold hover:text-yellow-300">Masuk</a>
        </p>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
