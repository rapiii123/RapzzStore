@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-4">

    <!-- TITLE -->
    <h2 class="text-2xl font-bold mb-6">
        {{ $game->name }}
    </h2>

    <!-- GRID PRODUCT -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

        @foreach($game->products as $product)
        <div class="relative bg-[#1e293b] rounded-xl overflow-hidden shadow-lg hover:scale-105 transition duration-300">

            <!-- BADGE -->
            <span class="absolute top-2 left-2 bg-yellow-400 text-black text-xs px-2 py-1 rounded">
                HOT
            </span>

            <!-- IMAGE -->
            <img src="{{ asset($product->image) }}" class="w-full h-32 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-lg">
                    {{ $product->name }}
                </h3>

                <p class="text-yellow-400 font-bold mt-2">
                    Rp {{ number_format($product->price) }}
                </p>

                <a href="/buy/{{ $product->id }}" class="block mt-3 text-center bg-yellow-400 text-black py-2 rounded">
                    Beli
                </a>
            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection