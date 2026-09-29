@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto py-8 px-4">
    <div class="bg-[#2a2f3d] rounded-xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Edit Banner</h2>
            <a href="{{ route('admin.banners.index') }}" class="text-white text-2xl hover:text-gray-300">✕</a>
        </div>

        <form id="editBannerForm" action="{{ route('admin.banners.update', $banner->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- Current Image -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Gambar Saat Ini</label>
                <div class="w-full h-48 rounded-lg overflow-hidden bg-gray-700">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                </div>
                <p class="text-gray-400 text-xs mt-2">Untuk mengganti gambar, pergi ke admin panel dan hapus lalu upload ulang banner</p>
            </div>

            <!-- Banner Title -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Judul Banner</label>
                <input type="text" name="title" placeholder="Judul banner" value="{{ $banner->title }}" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('title') border-red-500 @enderror" required maxlength="50">
                @error('title')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Banner Description -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Deskripsi Banner</label>
                <textarea name="description" placeholder="Deskripsi banner" rows="3" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('description') border-red-500 @enderror" required maxlength="100">{{ $banner->description }}</textarea>
                @error('description')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-400 text-xs mt-1"><span class="char-count">{{ strlen($banner->description) }}</span>/100 karakter</p>
            </div>

            <!-- Game Selection -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">Game (Opsional)</label>
                <select name="game_id" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none">
                    <option value="">Pilih Game (Opsional)</option>
                    @foreach($games as $game)
                    <option value="{{ $game->id }}" {{ $banner->game_id == $game->id ? 'selected' : '' }}>{{ $game->name }}</option>
                    @endforeach
                </select>
                <p class="text-gray-400 text-xs mt-1">Jika dipilih, klik banner akan mengarah ke halaman game ini</p>
            </div>

            <!-- Button URL -->
            <div>
                <label class="block text-gray-300 text-sm font-semibold mb-2">URL Eksternal (Opsional)</label>
                <input type="url" name="link" placeholder="https://example.com" value="{{ $banner->link }}" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none @error('link') border-red-500 @enderror">
                @error('link')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-400 text-xs mt-1">Jika ada, klik banner akan mengarah ke URL ini (jika game tidak dipilih)</p>
            </div>

            <!-- Status -->
            <div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $banner->is_active ? 'checked' : '' }} class="w-4 h-4">
                    <span class="text-gray-300 text-sm">Aktifkan banner ini</span>
                </label>
            </div>

            <!-- Submit -->
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-lg transition">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.banners.index') }}" class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 rounded-lg transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Update character count
const textarea = document.querySelector('textarea[name="description"]');
if (textarea) {
    textarea.addEventListener('input', function() {
        const count = this.value.length;
        document.querySelector('.char-count').textContent = count;
    });
}

// SweetAlert2 untuk Edit Banner
document.getElementById('editBannerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const bannerTitle = document.querySelector('input[name="title"]').value;
    
    Swal.fire({
        title: 'Simpan Perubahan?',
        html: `<p>Apakah anda yakin ingin menyimpan perubahan banner <strong>"${bannerTitle}"</strong>?</p>`,
        icon: 'question',
        background: '#1e293b',
        color: '#e5e7eb',
        confirmButtonColor: '#facc15',
        confirmButtonText: 'Ya, Simpan!',
        cancelButtonColor: '#6b7280',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Menyimpan...',
                text: 'Mohon tunggu...',
                icon: 'info',
                background: '#1e293b',
                color: '#e5e7eb',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            this.submit();
        }
    });
});

// Tampilkan success message jika ada session success
@if(session('success'))
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        icon: 'success',
        background: '#1e293b',
        color: '#e5e7eb',
        confirmButtonColor: '#10b981',
        confirmButtonText: 'Oke'
    }).then(() => {
        window.location.href = '{{ route('admin.banners.index') }}';
    });
@endif

// Tampilkan error message jika ada validation error
@if($errors->any())
    Swal.fire({
        title: 'Kesalahan!',
        text: 'Terdapat kesalahan dalam form. Silakan periksa kembali.',
        icon: 'error',
        background: '#1e293b',
        color: '#e5e7eb',
        confirmButtonColor: '#ef4444',
        confirmButtonText: 'Oke'
    });
@endif
</script>

@endsection
