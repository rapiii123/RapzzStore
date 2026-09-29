@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-8 px-4">
    <div class="bg-[#2a2f3d] rounded-xl p-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-white">Kelola Banner</h2>
            <button onclick="toggleUploadForm()" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-6 rounded-lg transition">
                + Upload Banner
            </button>
        </div>

        <!-- Upload Form (Hidden by Default) -->
        <div id="uploadForm" class="hidden bg-[#1e293b] p-6 rounded-lg mb-8 border border-gray-600">
            <h3 class="text-xl font-bold text-white mb-4">Upload Banner Baru</h3>
            <form id="uploadBannerForm" action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                
                <!-- Banner Image -->
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Banner Image</label>
                    <div class="border-2 border-dashed border-gray-600 rounded-lg p-6 text-center hover:border-yellow-400 transition cursor-pointer" id="dropZone">
                        <input type="file" name="image" id="imageInput" accept="image/*" class="hidden" required onchange="previewImage(event)">
                        <div class="text-gray-400">
                            <p class="text-lg mb-2">📁 Drag & drop image di sini</p>
                            <p class="text-sm">atau <span class="text-yellow-400 cursor-pointer" onclick="document.getElementById('imageInput').click()">klik untuk memilih</span></p>
                            <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG | Max: 5MB | Rekomendasi: 1200x400px</p>
                        </div>
                        <img id="preview" class="mt-4 max-h-64 mx-auto hidden rounded-lg" src="" alt="Preview">
                    </div>
                </div>

                <!-- Banner Title -->
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Judul Banner</label>
                    <input type="text" name="title" placeholder="Judul banner" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none" required maxlength="50">
                </div>

                <!-- Banner Description -->
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Deskripsi Banner</label>
                    <textarea name="description" placeholder="Deskripsi banner" rows="2" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none" required maxlength="100"></textarea>
                </div>

                <!-- Game Selection -->
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">Game (Opsional - klik banner akan ke halaman game)</label>
                    <select name="game_id" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none">
                        <option value="">Pilih Game (Opsional)</option>
                        @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Button URL (Optional) -->
                <div>
                    <label class="block text-gray-300 text-sm font-semibold mb-2">URL (Opsional - untuk button klik)</label>
                    <input type="url" name="link" placeholder="https://example.com" class="w-full bg-[#3a3f4d] text-white px-4 py-3 rounded border border-gray-600 focus:border-yellow-400 focus:outline-none">
                </div>

                <!-- Status -->
                <div>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4">
                        <span class="text-gray-300 text-sm">Aktifkan banner ini</span>
                    </label>
                </div>

                <!-- Submit -->
                <div class="flex gap-3 pt-4">
                    <button type="submit" class="flex-1 bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-lg transition">
                        Upload
                    </button>
                    <button type="button" onclick="toggleUploadForm()" class="flex-1 bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 rounded-lg transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>

        <!-- Banner List -->
        <div class="space-y-4">
            <h3 class="text-lg font-bold text-white mb-4">Daftar Banner</h3>

            @forelse($banners as $banner)
            <div class="bg-[#1e293b] p-4 rounded-lg flex gap-4 items-start border border-gray-600 hover:border-yellow-400 transition">
                <!-- Thumbnail -->
                <div class="w-32 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-700">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                </div>

                <!-- Info -->
                <div class="flex-1">
                    <h4 class="text-white font-semibold text-lg">{{ $banner->title }}</h4>
                    <p class="text-gray-400 text-sm mt-1">{{ $banner->description }}</p>
                    @if($banner->game)
                    <p class="text-blue-400 text-xs mt-2">Game: <strong>{{ $banner->game->name }}</strong></p>
                    @endif
                    @if($banner->link)
                    <p class="text-yellow-400 text-xs mt-2">🔗 Link: <a href="{{ $banner->link }}" target="_blank" class="underline">{{ $banner->link }}</a></p>
                    @endif
                    <p class="text-gray-500 text-xs mt-2">
                        Dibuat: {{ $banner->created_at->format('d M Y H:i') }} | 
                        Status: <span class="{{ $banner->is_active ? 'text-green-400' : 'text-red-400' }}">
                            {{ $banner->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex gap-2 flex-shrink-0">
                    <a href="{{ route('admin.banners.edit', $banner->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.banners.toggle', $banner->id) }}" method="POST" class="inline toggle-banner-form">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" class="banner-title" value="{{ $banner->title }}">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm transition">
                            {{ $banner->is_active ? 'Nonaktifkan' : '✓ Aktifkan' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="inline delete-banner-form">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" class="banner-title" value="{{ $banner->title }}">
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <p class="text-gray-400 text-center py-8">Belum ada banner. Silakan upload banner baru.</p>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function toggleUploadForm() {
    const form = document.getElementById('uploadForm');
    form.classList.toggle('hidden');
}

function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(file);
    }
}

// Drag & Drop
const dropZone = document.getElementById('dropZone');
const imageInput = document.getElementById('imageInput');

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('border-yellow-400', 'bg-yellow-400/10');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('border-yellow-400', 'bg-yellow-400/10');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-yellow-400', 'bg-yellow-400/10');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        imageInput.files = files;
        previewImage({ target: { files: files } });
    }
});

dropZone.addEventListener('click', () => {
    imageInput.click();
});

// SweetAlert2 untuk Upload Banner
document.getElementById('uploadBannerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    Swal.fire({
        title: 'Upload Banner?',
        text: 'Apakah anda yakin ingin mengupload banner ini?',
        icon: 'question',
        background: '#1e293b',
        color: '#e5e7eb',
        confirmButtonColor: '#facc15',
        confirmButtonText: 'Ya, Upload!',
        cancelButtonColor: '#6b7280',
        cancelButtonText: 'Batal',
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Uploading...',
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

// SweetAlert2 untuk Delete Banner
document.querySelectorAll('.delete-banner-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const bannerTitle = this.querySelector('.banner-title').value;
        
        Swal.fire({
            title: 'Hapus Banner?',
            html: `<p>Apakah anda yakin ingin menghapus banner <strong>"${bannerTitle}"</strong>?</p><p class="text-red-400 text-sm mt-2">Tindakan ini tidak dapat dibatalkan!</p>`,
            icon: 'warning',
            background: '#1e293b',
            color: '#e5e7eb',
            confirmButtonColor: '#dc2626',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonColor: '#6b7280',
            cancelButtonText: 'Batal',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Menghapus...',
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
});

// SweetAlert2 untuk Toggle Banner
document.querySelectorAll('.toggle-banner-form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const bannerTitle = this.querySelector('.banner-title').value;
        const submitBtn = this.querySelector('button[type="submit"]');
        const action = submitBtn.textContent.includes('Nonaktifkan') ? 'Nonaktifkan' : 'Aktifkan';
        
        Swal.fire({
            title: action + ' Banner?',
            html: `<p>Apakah anda yakin ingin <strong>${action.toLowerCase()}</strong> banner <strong>"${bannerTitle}"</strong>?</p>`,
            icon: 'question',
            background: '#1e293b',
            color: '#e5e7eb',
            confirmButtonColor: '#3b82f6',
            confirmButtonText: 'Ya, ' + action,
            cancelButtonColor: '#6b7280',
            cancelButtonText: 'Batal',
            showCancelButton: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Loading...',
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
