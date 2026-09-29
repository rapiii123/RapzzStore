<h2 class="text-yellow-400 font-bold text-xl mb-6">Menu</h2>

<a href="{{ route('dashboard') }}"
class="block px-3 py-2 rounded transition
{{ request()->routeIs('dashboard') ? 'bg-yellow-400 text-black font-semibold border-l-4 border-yellow-500' : 'hover:text-yellow-400' }}">
    Halaman Utama
</a>

<a href="{{ route('cekpesanan') }}"
class="block px-3 py-2 rounded transition
{{ request()->routeIs('cekpesanan') ? 'bg-yellow-400 text-black font-semibold border-l-4 border-yellow-500' : 'hover:text-yellow-400' }}">
    Cek Pesanan
</a>

<a href="{{ route('riwayat') }}"
class="block px-3 py-2 rounded transition
{{ request()->routeIs('riwayat') ? 'bg-yellow-400 text-black font-semibold border-l-4 border-yellow-500' : 'hover:text-yellow-400' }}">
    Riwayat Top up
</a>

<a href="{{ route('calculator') }}"
class="block px-3 py-2 rounded transition
{{ request()->routeIs('calculator') ? 'bg-yellow-400 text-black font-semibold border-l-4 border-yellow-500' : 'hover:text-yellow-400' }}">
    Kalkulator ML
</a>

<a href="{{ route('support') }}"
class="block px-3 py-2 rounded transition
{{ request()->routeIs('support') ? 'bg-yellow-400 text-black font-semibold border-l-4 border-yellow-500' : 'hover:text-yellow-400' }}">
    Support & FAQ
</a>