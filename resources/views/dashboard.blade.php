@extends('layouts.app')

@section('content')

<style>
    /* Slide Up Animation */
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scale Bounce Animation */
    @keyframes scaleUp {
        0% {
            opacity: 0;
            transform: scale(0.8);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Rotate Fade Animation */
    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotateY(90deg) translateX(-50px);
        }
        to {
            opacity: 1;
            transform: rotateY(0deg) translateX(0);
        }
    }

    /* Flip Animation */
    @keyframes flipIn {
        from {
            opacity: 0;
            transform: rotateX(90deg);
        }
        to {
            opacity: 1;
            transform: rotateX(0);
        }
    }

    /* Elastic Bounce */
    @keyframes elasticBounce {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
        }
        70% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    /* Glow Effect */
    @keyframes glow {
        0% {
            opacity: 0;
            box-shadow: 0 0 0 rgba(250, 204, 21, 0);
        }
        50% {
            box-shadow: 0 0 20px rgba(250, 204, 21, 0.5);
        }
        100% {
            opacity: 1;
            box-shadow: 0 0 0 rgba(250, 204, 21, 0);
        }
    }

    /* Slide In From Left */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Slide In From Right */
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .game-card {
        animation: slideInUp 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    /* Stagger delays */
    .game-card:nth-child(1) { animation-delay: 0.05s; }
    .game-card:nth-child(2) { animation-delay: 0.1s; }
    .game-card:nth-child(3) { animation-delay: 0.15s; }
    .game-card:nth-child(4) { animation-delay: 0.2s; }
    .game-card:nth-child(5) { animation-delay: 0.25s; }
    .game-card:nth-child(6) { animation-delay: 0.3s; }
    .game-card:nth-child(7) { animation-delay: 0.35s; }
    .game-card:nth-child(8) { animation-delay: 0.4s; }
    .game-card:nth-child(9) { animation-delay: 0.45s; }
    .game-card:nth-child(10) { animation-delay: 0.5s; }
    .game-card:nth-child(n+11) { animation-delay: 0.55s; }

    /* Hover animations */
    .game-card {
        position: relative;
        overflow: hidden;
    }

    .game-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
        z-index: 1;
    }

    .game-card:hover::before {
        left: 100%;
    }

    /* Enhanced hover effect */
    .game-card:hover {
        box-shadow: 0 0 30px rgba(250, 204, 21, 0.3), 0 10px 30px rgba(0, 0, 0, 0.5);
        transform: translateY(-8px);
    }

    /* Alternative animations - uncomment to use */
    .game-card.scale-bounce {
        animation: scaleUp 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards !important;
    }

    .game-card.rotate-in {
        animation: rotateIn 0.7s ease-out forwards !important;
    }

    .game-card.flip-in {
        animation: flipIn 0.6s ease-out forwards !important;
        perspective: 1000px;
    }

    .game-card.elastic {
        animation: elasticBounce 0.8s ease-out forwards !important;
    }

    .game-card.glow-effect {
        animation: glow 1s ease-out forwards !important;
    }

    .game-card.slide-left {
        animation: slideInLeft 0.6s ease-out forwards !important;
    }

    .game-card.slide-right {
        animation: slideInRight 0.6s ease-out forwards !important;
    }

    /* CAROUSEL STYLES */
    .carousel-container {
        position: relative;
        width: calc(100% - 80px);
        max-width: 1200px;
        margin: 0 auto 40px;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        aspect-ratio: 16 / 7;
    }

    .carousel-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #1a1f2e;
    }

    .carousel-slide {
        display: none;
        width: 100%;
        height: 100%;
        animation: fadeIn 0.5s ease-in-out;
    }

    .carousel-slide.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .carousel-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .carousel-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        padding: 15px 18px;
        font-size: 24px;
        cursor: pointer;
        border-radius: 4px;
        z-index: 10;
        transition: all 0.3s ease;
    }

    .carousel-control:hover {
        background: rgba(250, 204, 21, 0.9);
        color: black;
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-prev {
        left: 20px;
    }

    .carousel-next {
        right: 20px;
    }

    .carousel-indicators {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
    }

    .carousel-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .carousel-dot.active {
        background: #facc15;
        transform: scale(1.3);
        border: 2px solid white;
    }

    .carousel-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.95), rgba(0, 0, 0, 0.5) 60%, transparent);
        padding: 40px 30px 30px;
        color: white;
        z-index: 5;
    }

    .carousel-title {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.9);
    }

    .carousel-description {
        font-size: 16px;
        color: #e5e7eb;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.9);
    }
</style>

<!-- CAROUSEL BANNER SECTION -->
<div class="carousel-container">
    <div class="carousel-wrapper">
        @forelse($banners as $banner)
        <!-- Slide -->
        <div class="carousel-slide">
            <!-- Link wrapper - mengarah ke game atau external link -->
            @if($banner->game)
                <a href="{{ route('game.show', $banner->game->id) }}" class="w-full h-full flex items-center justify-center group cursor-pointer">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <div class="carousel-overlay group-hover:bg-black/40 transition duration-300">
                        <div class="carousel-title">{{ $banner->title }}</div>
                        <div class="carousel-description">{{ $banner->description }}</div>
                    </div>
                </a>
            @elseif($banner->link)
                <a href="{{ $banner->link }}" target="_blank" class="w-full h-full flex items-center justify-center group cursor-pointer">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <div class="carousel-overlay group-hover:bg-black/40 transition duration-300">
                        <div class="carousel-title">{{ $banner->title }}</div>
                        <div class="carousel-description">{{ $banner->description }}</div>
                    </div>
                </a>
            @else
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                <div class="carousel-overlay">
                    <div class="carousel-title">{{ $banner->title }}</div>
                    <div class="carousel-description">{{ $banner->description }}</div>
                </div>
            @endif
        </div>
        @empty
        <!-- Fallback jika belum ada banner -->
        <div class="carousel-slide active">
            <img src="https://images.unsplash.com/photo-1538481143235-f2aa9fb82503?w=1200&h=400&fit=crop" alt="Gaming Banner">
            <div class="carousel-overlay">
                <div class="carousel-title">Welcome to RapzzStore</div>
                <div class="carousel-description">Tempat top up game terpercaya dengan harga murah & cepat!</div>
            </div>
        </div>
        @endforelse

        <!-- Navigation Buttons -->
        <button class="carousel-control carousel-prev" onclick="prevSlide()">❮</button>
        <button class="carousel-control carousel-next" onclick="nextSlide()">❯</button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($banners as $key => $banner)
            <span class="carousel-dot {{ $key == 0 ? 'active' : '' }}" onclick="goToSlide({{ $key }})"></span>
            @endforeach
        </div>
    </div>
</div>

<h2 class="text-2xl font-bold mb-6">🔥 Top Up Games</h2>

<div class="flex justify-between items-center mb-6">

    <!-- LEFT: CATEGORY -->
    <div class="flex gap-3">

        <a href="{{ route('dashboard', ['category' => 'moba']) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold 
           {{ request('category') == 'moba' ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
            MOBA
        </a>

        <a href="{{ route('dashboard', ['category' => 'fps']) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold 
           {{ request('category') == 'fps' ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
            FPS
        </a>

        <a href="{{ route('dashboard', ['category' => 'rpg']) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold 
           {{ request('category') == 'rpg' ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
            RPG
        </a>

        <a href="{{ route('dashboard', ['category' => 'sports']) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold 
           {{ request('category') == 'sports' ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
            Sports
        </a>

        <a href="{{ route('dashboard', ['category' => 'strategy']) }}"
           class="px-4 py-2 rounded-full text-sm font-semibold 
           {{ request('category') == 'strategy' ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
            Strategy
        </a>
    </div>

    <!-- RIGHT: ALL GAMES -->
    <a href="{{ route('dashboard') }}"
       class="px-4 py-2 rounded-full text-sm font-semibold 
       {{ request('category') == null ? 'bg-yellow-400 text-black' : 'bg-[#1e293b] text-gray-300 hover:bg-gray-700' }}">
        All Games
    </a>

</div>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">

@foreach($games as $game)
<a href="{{ url('/game/'.$game->id) }}">
    <div class="game-card bg-[#1e293b] rounded-lg overflow-hidden hover:scale-105 transition duration-300 cursor-pointer shadow-md">
    <div class="aspect-[16/9] overflow-hidden">
    <img src="{{ asset($game->image) }}"
         class="w-full h-full object-cover hover:scale-110 transition duration-300">
    </div>

    <div class="p-2 text-center text-sm font-semibold truncate">
        {{ $game->name }}
        
    </div>

    
</div>
</a>
@endforeach

</div>

<!-- CAROUSEL JAVASCRIPT -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const totalSlides = slides.length;
    let autoSlideInterval;

    function showSlide(n) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        const dots = document.querySelectorAll('.carousel-dot');
        dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide and corresponding dot
        slides[n].classList.add('active');
        dots[n].classList.add('active');
    }

    function nextSlide() {
        if (totalSlides === 0) return; // Jika tidak ada slide, jangan lakukan apa-apa
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function prevSlide() {
        if (totalSlides === 0) return;
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function goToSlide(n) {
        if (totalSlides === 0 || n < 0 || n >= totalSlides) return;
        currentSlide = n;
        showSlide(currentSlide);
        resetAutoSlide();
    }

    function autoSlide() {
        nextSlide();
    }

    function resetAutoSlide() {
        clearInterval(autoSlideInterval);
        if (totalSlides > 1) {
            autoSlideInterval = setInterval(autoSlide, 3000); // Change slide every 3 seconds
        }
    }

    // Initialize carousel (hanya jika ada slides)
    if (totalSlides > 0) {
        showSlide(0);
        if (totalSlides > 1) {
            autoSlideInterval = setInterval(autoSlide, 3000);
        }
    }

</script>

@endsection

<script>
    // Array of animation classes
    const animations = ['slideInUp', 'scale-bounce', 'rotate-in', 'flip-in', 'elastic', 'glow-effect', 'slide-left', 'slide-right'];
    let currentAnimationIndex = 0;

    // Function to reset animations
    function resetGameAnimations() {
        const gameCards = document.querySelectorAll('.game-card');
        
        gameCards.forEach(card => {
            // Remove all animation classes
            animations.forEach(anim => card.classList.remove(anim));
            
            // Remove animation style to restart it
            card.style.animation = 'none';
            setTimeout(() => {
                card.style.animation = '';
            }, 10);
        });
    }

    // Listen to category clicks
    document.querySelectorAll('a[href*="category"]').forEach(link => {
        link.addEventListener('click', () => {
            setTimeout(() => {
                currentAnimationIndex = (currentAnimationIndex + 1) % animations.length;
                resetGameAnimations();
            }, 100);
        });
    });

    // Listen to "All Games" link
    document.querySelectorAll('a[href*="dashboard"]').forEach(link => {
        if (!link.href.includes('category') && !link.href.includes('game')) {
            link.addEventListener('click', () => {
                setTimeout(() => {
                    currentAnimationIndex = (currentAnimationIndex + 1) % animations.length;
                    resetGameAnimations();
                }, 100);
            });
        }
    });

    // Listen to search
    const searchForm = document.querySelector('form[method="GET"]');
    if (searchForm) {
        searchForm.addEventListener('submit', () => {
            setTimeout(() => {
                currentAnimationIndex = (currentAnimationIndex + 1) % animations.length;
                resetGameAnimations();
            }, 100);
        });
    }
</script>
