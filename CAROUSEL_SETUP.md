# Carousel Banner Setup Guide

## Fitur Carousel
- Banner otomatis berubah setiap 5 detik
- Tombol Previous/Next untuk navigasi manual
- Indicator dots untuk menunjukkan slide aktif
- Responsive design dengan overlay gradient
- Drag & drop image upload

## Setup Instructions

### 1. Jalankan Migration
```bash
php artisan migrate
```

Ini akan membuat table `banners` dengan struktur:
- id
- title (max 50 char)
- description (max 100 char)
- image (path file)
- link (optional URL)
- is_active (boolean)
- order (untuk sorting)
- timestamps

### 2. Setup Storage Link (untuk akses public images)
```bash
php artisan storage:link
```

Ini membuat symbolic link dari `storage/app/public` ke `public/storage`

### 3. Akses Admin Dashboard
- URL: `/admin/banners`
- (Perlu login - adjust Route middleware sesuai kebutuhan)

### 4. Upload Banner Baru
1. Klik tombol "+ Upload Banner"
2. Drag & drop atau klik untuk pilih image
3. Isi judul (max 50 karakter)
4. Isi deskripsi (max 100 karakter)
5. Opsional: Tambah URL untuk link banner
6. Centang "Aktifkan banner ini"
7. Klik Upload

### 5. Manage Banners
- **Aktifkan/Nonaktifkan**: Klik tombol untuk toggle status
- **Hapus**: Klik tombol hapus untuk delete banner dan imagenya
- Banner yang aktif otomatis ditampilkan di carousel

## Spesifikasi Image
- **Format**: JPG, PNG
- **Max Size**: 5MB
- **Rekomendasi**: 1200x400px (aspect ratio 3:1)

## File Structure
```
app/
├── Models/
│   └── Banner.php
├── Http/
│   └── Controllers/
│       └── BannerController.php
database/
├── migrations/
│   └── 2026_05_04_create_banners_table.php
resources/
├── views/
│   ├── dashboard.blade.php (carousel sudah ditambahkan)
│   └── admin/
│       └── banners.blade.php (management page)
routes/
└── web.php (routes sudah ditambahkan)
```

## Customize Carousel

### Ubah Auto-slide Interval
Di `dashboard.blade.php`, cari line:
```javascript
autoSlideInterval = setInterval(autoSlide, 5000); // Ubah 5000 ke millisecond yang diinginkan
```

### Ubah Styling
CSS carousel sudah di-define di `dashboard.blade.php` dalam tag `<style>`
Sesuaikan warna, ukuran, shadow, dll sesuai preferensi

### Tambah Sample Data (untuk testing)
```php
php artisan tinker

Banner::create([
    'title' => 'MEI STARLIGHT',
    'description' => 'Obsidian "Magitech Wraith" - Dapatkan karakter terbaru sekarang!',
    'image' => 'banners/sample1.jpg',
    'is_active' => true,
    'order' => 1
]);
```

## Troubleshooting

**Q: Image tidak tampil**
- Pastikan sudah jalankan `php artisan storage:link`
- Check folder `storage/app/public/banners/` sudah ada file imagenya
- Browser cache? Clear browser cache

**Q: Form upload tidak bekerja**
- Check file permissions di `storage/app/public`
- Pastikan server support file upload dengan size yang diinginkan

**Q: Carousel tidak auto-slide**
- Check browser console untuk error JavaScript
- Pastikan JavaScript di `dashboard.blade.php` tidak error

## Notes
- Default middleware untuk admin routes adalah `auth` - ubah di `web.php` jika perlu custom
- Untuk production, consider menambahkan image compression/optimization
- Backup database dan images secara berkala
