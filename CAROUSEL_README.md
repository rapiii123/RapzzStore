# 📸 Carousel Banner - Ringkasan Implementasi

## ✅ Apa yang Sudah Ditambahkan

### 1. **Carousel di Dashboard (Halaman Utama)**
- Banner carousel dengan 4 slide contoh
- Auto-slide setiap 5 detik
- Tombol Previous (❮) & Next (❯) untuk navigasi manual
- Indicator dots di bawah untuk menunjukkan slide mana yang aktif
- Overlay gradient dengan title dan deskripsi di setiap slide
- Responsive design dan smooth fade animation

**Lokasi**: `/resources/views/dashboard.blade.php` (Top section sebelum "🔥 Top Up Games")

### 2. **Admin Dashboard untuk Manage Banners**
- Upload image dengan drag & drop
- Preview image sebelum upload
- Atur title, description, dan optional link
- Aktifkan/nonaktifkan banner
- Delete banner
- List semua banners dengan info lengkap

**Lokasi**: `/admin/banners` (requires authentication)
**File**: `/resources/views/admin/banners.blade.php`

### 3. **Model & Controller**
- **Model**: `app/Models/Banner.php`
- **Controller**: `app/Http/Controllers/BannerController.php`
  - index(): Tampilkan daftar banners
  - store(): Upload banner baru
  - toggle(): Aktifkan/nonaktifkan banner
  - destroy(): Hapus banner

### 4. **Database Migration**
**File**: `/database/migrations/2026_05_04_create_banners_table.php`

Jalankan dengan:
```bash
php artisan migrate
```

### 5. **Routes**
Di `/routes/web.php`:
```php
// Admin routes (protected with auth middleware)
Route::get('/admin/banners', [BannerController::class, 'index'])->name('admin.banners.index');
Route::post('/admin/banners', [BannerController::class, 'store'])->name('admin.banners.store');
Route::patch('/admin/banners/{id}/toggle', [BannerController::class, 'toggle'])->name('admin.banners.toggle');
Route::delete('/admin/banners/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
```

---

## 🚀 Cara Menggunakan

### Step 1: Setup Database
```bash
# Buka terminal di project folder
php artisan migrate
php artisan storage:link
```

### Step 2: Upload Banner Pertama
1. Akses: `/admin/banners` (setelah login)
2. Klik "+ Upload Banner"
3. Drag & drop image (atau klik untuk browse)
4. Isi form:
   - **Judul**: MEI STARLIGHT (max 50 char)
   - **Deskripsi**: Obsidian "Magitech Wraith" (max 100 char)
   - **Link**: https://example.com (optional)
   - **Aktifkan**: Centang checkbox
5. Klik "Upload"

### Step 3: Lihat Carousel di Dashboard
- Buka halaman utama: `/`
- Carousel banner tampil di paling atas
- Test navigasi dengan tombol Previous/Next
- Test auto-slide (berubah tiap 5 detik)
- Klik indicator dots untuk jump ke slide tertentu

---

## 📝 Contoh Image untuk Upload

### Current Demo Images (dari Unsplash):
1. **Slide 1**: Gaming character scene
2. **Slide 2**: Action game promotional
3. **Slide 3**: RPG game banner
4. **Slide 4**: Multiplayer game promo

Bisa ganti dengan image:
- Karakter game favorit
- Promo special event
- New season announcement
- Limited time offer

### Spesifikasi Rekomendasi:
- **Dimensi**: 1200x400px (aspect ratio 3:1)
- **Format**: JPG atau PNG
- **File Size**: Max 5MB
- **Quality**: 72-96 DPI untuk web

---

## 🎨 Customization Tips

### 1. Ubah Warna Overlay
Di `dashboard.blade.php`, cari `.carousel-overlay`:
```css
background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
/* Ubah rgba values untuk opacity berbeda */
```

### 2. Ubah Kecepatan Slide
```javascript
autoSlideInterval = setInterval(autoSlide, 5000); // 5000ms = 5 detik
// Ubah ke 3000 untuk 3 detik, 8000 untuk 8 detik, dst
```

### 3. Ubah Button Style
```css
.carousel-control:hover {
    background: rgba(250, 204, 21, 0.9); /* Ubah warna hover */
    transform: translateY(-50%) scale(1.1); /* Scale saat hover */
}
```

### 4. Tambah More Slides
Duplikat `.carousel-slide` div di HTML dan tambah `.carousel-dot` di indicators

---

## 🔧 Troubleshooting

| Masalah | Solusi |
|---------|--------|
| Image tidak tampil | Jalankan `php artisan storage:link` |
| Upload gagal | Check folder permission `storage/app/public` |
| Carousel tidak bergerak | Clear browser cache, check console F12 untuk error |
| Admin page butuh login | Edit middleware di `web.php` route group |
| File size error | Ubah max upload size di `php.ini` |

---

## 📁 File Structure

```
ecommerce-topup/
├── app/
│   ├── Models/
│   │   └── Banner.php ✨ (NEW)
│   └── Http/Controllers/
│       └── BannerController.php ✨ (NEW)
├── database/
│   └── migrations/
│       └── 2026_05_04_create_banners_table.php ✨ (NEW)
├── resources/
│   └── views/
│       ├── dashboard.blade.php (UPDATED - carousel ditambahkan)
│       └── admin/
│           └── banners.blade.php ✨ (NEW)
├── routes/
│   └── web.php (UPDATED - admin routes ditambahkan)
├── storage/
│   └── app/
│       └── public/
│           └── banners/ (images akan tersimpan di sini)
└── CAROUSEL_SETUP.md ✨ (NEW - documentation)
```

---

## 📌 Next Steps (Optional)

1. **Add Scheduling** untuk auto-refresh carousel data
2. **Add Analytics** untuk track banner clicks
3. **Add Categories** untuk organize banners per game/promo
4. **Add Reordering** drag & drop untuk manage order banners
5. **Add Image Optimization** compress images saat upload

---

Semua fitur carousel sudah siap! 🎉
Tinggal jalankan migration dan mulai upload banner di admin panel.
