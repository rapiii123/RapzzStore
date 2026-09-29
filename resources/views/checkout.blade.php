@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Form Pembayaran -->
        <div class="lg:col-span-2 bg-[#1e293b] p-8 rounded-xl">

            <form id="paymentForm" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- User ID & Server -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div>
                        <label class="block text-sm font-semibold mb-2">ID Game</label>
                        <input type="text" name="user_id" id="user_id" placeholder="Masukkan ID"
                               class="w-full p-3 rounded bg-[#2a2f3d] border border-gray-600 focus:border-yellow-400 focus:outline-none @error('user_id') border-red-500 @enderror">
                        @error('user_id')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold mb-2">Server</label>
                        <input type="text" name="server" id="server" placeholder="Masukkan Server"
                               class="w-full p-3 rounded bg-[#2a2f3d] border border-gray-600 focus:border-yellow-400 focus:outline-none @error('server') border-red-500 @enderror">
                        @error('server')
                            <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold mb-2">Jumlah Pembelian</label>
                    <div class="flex items-center gap-3">
                        <button type="button" id="decreaseQty" class="bg-[#2a2f3d] hover:bg-[#3a3f4d] text-white px-4 py-3 rounded transition">−</button>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" max="99"
                               class="flex-1 p-3 rounded bg-[#2a2f3d] border border-gray-600 focus:border-yellow-400 focus:outline-none text-center font-semibold">
                        <button type="button" id="increaseQty" class="bg-[#2a2f3d] hover:bg-[#3a3f4d] text-white px-4 py-3 rounded transition">+</button>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold mb-3">Metode Pembayaran</label>

                    <!-- QRIS Section -->
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-400 mb-2 uppercase">Recommended</p>
                        <label class="flex items-center p-3 bg-[#2a2f3d] rounded border-2 border-yellow-400 hover:border-yellow-300 cursor-pointer transition">
                            <input type="radio" name="payment" value="QRIS" class="w-4 h-4">
                            <span class="ml-3 flex items-center gap-2"><span class="font-semibold">QRIS (All Payment)</span></span>
                            <span class="ml-auto text-xs bg-yellow-400 text-black px-2 py-1 rounded font-semibold">Best</span>
                        </label>
                    </div>
                    
                    <!-- E-Wallet Section -->
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-400 mb-2 uppercase">E-Wallet</p>
                        <div class="space-y-2">
                            <label class="flex items-center p-3 bg-[#2a2f3d] rounded border border-gray-600 hover:border-yellow-400 cursor-pointer transition">
                                <input type="radio" name="payment" value="DANA" class="w-4 h-4">
                                <span class="ml-3 flex items-center gap-2"><span>DANA</span></span>
                            </label>
                            <label class="flex items-center p-3 bg-[#2a2f3d] rounded border border-gray-600 hover:border-yellow-400 cursor-pointer transition">
                                <input type="radio" name="payment" value="OVO" class="w-4 h-4">
                                <span class="ml-3 flex items-center gap-2"><span>OVO</span></span>
                            </label>
                            <label class="flex items-center p-3 bg-[#2a2f3d] rounded border border-gray-600 hover:border-yellow-400 cursor-pointer transition">
                                <input type="radio" name="payment" value="GOPAY" class="w-4 h-4">
                                <span class="ml-3 flex items-center gap-2"><span>GOPAY</span></span>
                            </label>
                            <label class="flex items-center p-3 bg-[#2a2f3d] rounded border border-gray-600 hover:border-yellow-400 cursor-pointer transition">
                                <input type="radio" name="payment" value="SHOPEEPAY" class="w-4 h-4">
                                <span class="ml-3 flex items-center gap-2"><span>SHOPEEPAY</span></span>
                            </label>
                        </div>
                    </div>

                    

                    <!-- Bank Transfer Section (Coming Soon) -->
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-400 mb-2 uppercase">Transfer Bank</p>
                        <div class="p-3 bg-[#2a2f3d] rounded border border-gray-600 text-gray-400 text-sm">
                            <p class="text-center opacity-50">Coming Soon</p>
                        </div>
                    </div>

                    <!-- Minimart Section (Coming Soon) -->
                    <div class="mb-4">
                        <p class="text-xs font-semibold text-gray-400 mb-2 uppercase">Minimart / Indomart</p>
                        <div class="p-3 bg-[#2a2f3d] rounded border border-gray-600 text-gray-400 text-sm">
                            <p class="text-center opacity-50">Coming Soon</p>
                        </div>
                    </div>
                    @error('payment')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor HP (untuk E-Wallet) -->
                <div id="phoneBox" class="hidden mb-4">
                    <label class="block text-sm font-semibold mb-2">Nomor HP / WA</label>
                    <div class="flex gap-2">
                        <select id="countryCode" class="w-20 p-3 rounded bg-[#2a2f3d] border border-gray-600">
                            <option value="+62">🇮🇩 +62</option>
                        </select>
                        <input type="text" name="phone_number" id="phone_number" placeholder="8XX XXXX XXXX"
                               class="flex-1 p-3 rounded bg-[#2a2f3d] border border-gray-600 focus:border-yellow-400 focus:outline-none @error('phone_number') border-red-500 @enderror">
                    </div>
                    <p class="text-gray-400 text-xs mt-1">Nomor HP yang terdaftar di e-wallet Anda</p>
                    @error('phone_number')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-3 rounded-lg transition mt-6">
                    Pesan Sekarang
                </button>

                <p class="text-center text-gray-400 text-xs mt-3">Pembayaran aman & terpercaya</p>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="bg-[#1e293b] p-6 rounded-xl h-fit sticky top-8">
            <h3 class="text-xl font-bold mb-6">Ringkasan Pesanan</h3>
            
            <!-- Product -->
            <div class="mb-6">
                <img src="{{ asset($product->image) }}" 
                     class="w-full h-40 object-cover rounded mb-4">
                <h4 class="font-semibold text-base">{{ $product->name }}</h4>
                <p class="text-gray-400 text-sm mt-1">Game: {{ $product->game->name }}</p>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-600 py-4 my-4"></div>

            <!-- Price -->
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Harga per Item:</span>
                    <span class="text-white font-medium" id="pricePerItem">Rp {{ number_format($product->price) }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Jumlah:</span>
                    <span class="text-white font-medium" id="quantityDisplay">1x</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-400">Biaya Admin:</span>
                    <span class="text-white font-medium">Rp 0</span>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-600 py-4 my-4"></div>

            <!-- Total -->
            <div class="flex justify-between font-bold text-lg mb-6">
                <span>Total:</span>
                <span class="text-yellow-400 text-xl" id="totalPrice">Rp {{ number_format($product->price) }}</span>
            </div>

            <!-- Info -->
            <div class="p-4 rounded bg-blue-900/30 border border-blue-700 space-y-2">
                <p class="text-xs text-blue-300">
                    ✓ Pembayaran akan diproses otomatis setelah konfirmasi
                </p>
                <p class="text-xs text-blue-300">
                    ✓ Topup akan dikirim dalam 1-5 menit
                </p>
            </div>
        </div>

    </div>
</div>

<script>
const form = document.getElementById('paymentForm');
const paymentRadios = document.querySelectorAll('input[name="payment"]');
const phoneBox = document.getElementById('phoneBox');
const phoneInput = document.getElementById('phone_number');
const quantityInput = document.getElementById('quantity');
const basePrice = {{ $product->price }};
const productName = '{{ $product->name }}';
const gameName = '{{ $product->game->name }}';

// Quantity handlers
document.getElementById('increaseQty').addEventListener('click', function(e) {
    e.preventDefault();
    let qty = parseInt(quantityInput.value) || 1;
    if (qty < 99) quantityInput.value = qty + 1;
    updatePriceDisplay();
});

document.getElementById('decreaseQty').addEventListener('click', function(e) {
    e.preventDefault();
    let qty = parseInt(quantityInput.value) || 1;
    if (qty > 1) quantityInput.value = qty - 1;
    updatePriceDisplay();
});

quantityInput.addEventListener('input', updatePriceDisplay);

function updatePriceDisplay() {
    const qty = parseInt(quantityInput.value) || 1;
    const total = basePrice * qty;
    document.getElementById('quantityDisplay').textContent = qty + 'x';
    document.getElementById('totalPrice').textContent = 'Rp ' + formatRupiah(total);
}

function formatRupiah(num) {
    return new Intl.NumberFormat('id-ID').format(num);
}

// Show/hide phone number field untuk e-wallet
function updatePaymentOptions() {
    const selectedPayment = document.querySelector('input[name="payment"]:checked')?.value;
    const ewallets = ['DANA', 'OVO', 'GOPAY', 'SHOPEEPAY'];
    
    if (ewallets.includes(selectedPayment)) {
        phoneBox.classList.remove('hidden');
    } else {
        phoneBox.classList.add('hidden');
        phoneInput.value = '';
    }
}

// Add event listeners to all radio buttons
paymentRadios.forEach(radio => {
    radio.addEventListener('change', updatePaymentOptions);
});

// Validasi nomor HP format
function validatePhone(phone) {
    const digits = phone.replace(/\D/g, '');
    
    if (digits.length < 10 || digits.length > 13) {
        return false;
    }
    
    if (digits.startsWith('0') || digits.startsWith('62')) {
        return true;
    }
    
    return false;
}

// Format nomor HP saat input
phoneInput.addEventListener('input', function() {
    let value = this.value.replace(/\D/g, '');
    
    if (value.length > 13) {
        value = value.substring(0, 13);
    }
    
    if (value.length > 4) {
        value = value.substring(0, 4) + ' ' + value.substring(4);
    }
    if (value.length > 9) {
        value = value.substring(0, 9) + ' ' + value.substring(9);
    }
    
    this.value = value;
});

// Handle form submit
form.addEventListener('submit', function(e) {
    e.preventDefault();

    let userId = document.getElementById('user_id').value.trim();
    let server = document.getElementById('server').value.trim();
    let payment = document.querySelector('input[name="payment"]:checked')?.value;
    let phone = phoneInput.value.trim();
    let quantity = parseInt(quantityInput.value) || 1;
    const totalPrice = basePrice * quantity;

    // Validasi ID Game
    if (!userId) {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Masukkan ID Game terlebih dahulu!',
            background: '#1e293b',
            color: '#fff',
            confirmButtonColor: '#facc15',
        });
        return;
    }

    if (userId.length < 3) {
        Swal.fire({
            icon: 'error',
            title: 'ID Terlalu Pendek',
            text: 'ID Game minimal 3 karakter!',
            background: '#1e293b',
            color: '#fff',
            confirmButtonColor: '#facc15',
        });
        return;
    }

    // Validasi Server
    if (!server) {
        Swal.fire({
            icon: 'error',
            title: 'Server Diperlukan',
            text: 'Masukkan nomor server!',
            background: '#1e293b',
            color: '#fff',
            confirmButtonColor: '#facc15',
        });
        return;
    }

    // Validasi metode pembayaran
    if (!payment) {
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Pilih metode pembayaran!',
            background: '#1e293b',
            color: '#fff',
            confirmButtonColor: '#facc15',
        });
        return;
    }

    // Validasi nomor HP untuk e-wallet
    const ewallets = ['DANA', 'OVO', 'GOPAY', 'SHOPEEPAY'];
    if (ewallets.includes(payment)) {
        if (!phone) {
            Swal.fire({
                icon: 'error',
                title: 'Nomor HP Diperlukan',
                text: 'Masukkan nomor HP/WA untuk ' + payment,
                background: '#1e293b',
                color: '#fff',
                confirmButtonColor: '#facc15',
            });
            return;
        }

        if (!validatePhone(phone)) {
            Swal.fire({
                icon: 'error',
                title: 'Nomor HP Tidak Valid',
                text: 'Format nomor HP tidak benar. Gunakan 10-13 digit.',
                background: '#1e293b',
                color: '#fff',
                confirmButtonColor: '#facc15',
            });
            return;
        }

        let normalizedPhone = phone.replace(/\D/g, '');
        if (normalizedPhone.startsWith('0')) {
            normalizedPhone = '62' + normalizedPhone.substring(1);
        }
        phoneInput.value = normalizedPhone;
    }

    // Show confirmation modal
    showOrderConfirmation({
        userId,
        server,
        payment,
        quantity,
        totalPrice
    });
});

function showOrderConfirmation(orderData) {
    Swal.fire({
        title: 'Buat Pesanan',
        html: `
            <div class="text-left space-y-3">
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Username</span>
                    <span class="font-semibold">${orderData.userId}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Server</span>
                    <span class="font-semibold">${orderData.server}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Item</span>
                    <span class="font-semibold">${productName}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Jumlah</span>
                    <span class="font-semibold">${orderData.quantity}x</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Product</span>
                    <span class="font-semibold">${gameName}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Total Harga</span>
                    <span class="font-semibold">Rp ${orderData.totalPrice.toLocaleString('id-ID')}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-600">
                    <span class="text-gray-400">Payment</span>
                    <span class="font-semibold">${orderData.payment}</span>
                </div>
                <div class="p-3 rounded bg-green-900/30 border border-green-700">
                    <p class="text-xs text-green-300">
                        ✓ Dengan mengklik "Pesan Sekarang", kamu sudah menyetujui Syarat & Ketentuan yang berlaku.
                        <a href="/terms" target="_blank" class="text-green-400 hover:underline font-semibold">Lihat Syarat&Ketentuan</a>
                    </p>
                </div>
            </div>
        `,
        icon: 'question',
        background: '#1e293b',
        color: '#fff',
        confirmButtonColor: '#facc15',
        confirmButtonText: 'Pesan Sekarang',
        cancelButtonColor: '#6b7280',
        cancelButtonText: 'Batalkan',
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading
            Swal.fire({
                title: 'Memproses Pesanan...',
                text: 'Mohon tunggu sebentar',
                icon: 'info',
                background: '#1e293b',
                color: '#fff',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                    setTimeout(() => {
                        form.submit();
                    }, 1500);
                }
            });
        }
    });
}

// Show error message jika ada
@if($errors->any())
    let errorMsg = '';
    @foreach($errors->all() as $error)
        errorMsg += '{{ $error }}\n';
    @endforeach
    
    Swal.fire({
        title: 'Kesalahan!',
        text: errorMsg,
        icon: 'error',
        background: '#1e293b',
        color: '#fff',
        confirmButtonColor: '#ef4444',
    });
@endif
</script>

@endsection