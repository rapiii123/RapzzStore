@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto py-12 px-4">
    <div class="bg-[#2a2f3d] rounded-xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Masuk</h2>
            <a href="/" class="text-white text-2xl hover:text-gray-300">✕</a>
        </div>
        <p class="text-gray-300 mb-8">Masuk dengan akun yang telah Kamu daftarkan.</p>

        <form action="{{ route('sign-in') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Username -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Username</label>
                <input type="text" name="username" placeholder="Username" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('username') border-red-500 @enderror" value="{{ old('username') }}" required>
                @error('username')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Kata sandi</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Kata sandi" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('password') border-red-500 @enderror" required>
                    <button type="button" onclick="togglePassword()" class="absolute right-3 top-3 text-gray-400 hover:text-white">👁️</button>
                </div>
                @error('password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center gap-3">
                <input type="checkbox" id="rememberMe" name="remember" class="">
                <label for="rememberMe" class="text-gray-300 text-sm">Remember me</label>
                <a href="#" class="ml-auto text-yellow-400 text-sm hover:text-yellow-300">Lupa kata sandi mu?</a>
            </div>

            <!-- reCAPTCHA -->
            <div class="bg-white p-3 rounded">
                <div style="transform:scale(0.9);transform-origin:0 0">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-lg transition">
                Masuk
            </button>
        </form>

        <!-- Register Link -->
        <p class="text-center text-gray-300 text-sm mt-4">
            Belum memiliki akun? <a href="{{ route('sign-up') }}" class="text-yellow-400 font-semibold hover:text-yellow-300">Daftar</a>
        </p>

        <!-- Google Sign In -->
        <div class="mt-6 pt-6 border-t border-gray-600">
            <p class="text-center text-gray-400 text-sm mb-4">Atau lanjutkan dengan</p>
            <button type="button" class="w-full bg-[#3a3f4d] hover:bg-[#4a4f5d] text-white font-semibold py-3 rounded-lg transition flex items-center justify-center gap-3">
                <span class="text-2xl">🔘</span> Google
            </button>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
}
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endsection
