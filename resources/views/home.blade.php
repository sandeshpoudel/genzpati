@extends('layouts.public')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-10">

    {{-- 🌟 Featured Articles --}}
<section class="mb-12 relative">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Featured News
        </h2>
        <div class="flex gap-3">
            <button class="featured-prev group relative w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                <svg class="w-6 h-6 text-white transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button class="featured-next group relative w-12 h-12 rounded-full bg-gradient-to-br from-purple-600 to-pink-500 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                <svg class="w-6 h-6 text-white transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Featured Carousel -->
    <div class="swiper featuredSwiper relative rounded-2xl overflow-hidden shadow-2xl">
        <div class="swiper-wrapper">
            @foreach($featured as $article)
            <div class="swiper-slide relative group">
                <!-- Image with overlay -->
                <div class="relative h-96 overflow-hidden">
                    <img src="{{ asset('storage/' . $article->featured_image) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Gradient overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-80"></div>
                    
                    <!-- Content overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 transform translate-y-0 transition-transform duration-500">
                        <!-- Category badge -->
                        <div class="inline-block mb-3">
                            <span class="px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-wider bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg backdrop-blur-sm">
                                {{ $article->category->name ?? 'Uncategorized' }}
                            </span>
                        </div>
                        
                        <!-- Title -->
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-3 leading-tight transform group-hover:translate-x-2 transition-transform duration-300">
                            {{ $article->title }}
                        </h2>
                        
                        <!-- Meta info -->
                        <div class="flex items-center gap-4 text-gray-300">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm">{{ $article->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <!-- Read more link -->
                        <a href="{{ route('public.show', $article->slug) }}" 
                           class="inline-flex items-center gap-2 mt-4 text-white font-semibold group/link opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span>Read More</span>
                            <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Decorative corner accent -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-500/20 to-transparent transform translate-x-16 -translate-y-16 rotate-45"></div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Progress bar -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-white/20 z-10">
            <div class="swiper-pagination-progressbar-fill h-full bg-gradient-to-r from-blue-500 via-purple-600 to-pink-500"></div>
        </div>
    </div>

    <!-- Slide counter -->
    <div class="flex justify-center mt-6 gap-2">
        <div class="swiper-pagination-custom flex gap-2"></div>
    </div>
</section>

<style>
    .featuredSwiper .swiper-slide {
        opacity: 0.4;
        transition: opacity 0.6s ease;
    }
    
    .featuredSwiper .swiper-slide-active {
        opacity: 1;
    }

    .swiper-pagination-custom .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: #e5e7eb;
        border-radius: 50%;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .swiper-pagination-custom .swiper-pagination-bullet-active {
        background: linear-gradient(135deg, #3b82f6 0%, #9333ea 100%);
        width: 32px;
        border-radius: 6px;
    }

    .swiper-pagination-progressbar-fill {
        transition: width 2s linear;
    }
</style>

<script>
    const featuredSwiper = new Swiper(".featuredSwiper", {
        loop: true,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        speed: 1000,
        effect: 'creative',
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ['-20%', 0, -1],
                opacity: 0.5,
            },
            next: {
                translate: ['100%', 0, 0],
                opacity: 0.5,
            },
        },
        navigation: {
            nextEl: ".featured-next",
            prevEl: ".featured-prev",
        },
        pagination: {
            el: ".swiper-pagination-custom",
            clickable: true,
            renderBullet: function (index, className) {
                return '<span class="' + className + '"></span>';
            },
        },
        on: {
            init: function () {
                updateProgressBar(this);
            },
            slideChange: function () {
                updateProgressBar(this);
            },
        }
    });

    function updateProgressBar(swiper) {
        const progressBar = document.querySelector('.swiper-pagination-progressbar-fill');
        if (progressBar) {
            progressBar.style.width = '0%';
            setTimeout(() => {
                progressBar.style.width = '100%';
            }, 50);
        }
    }
</script>
{{-- end of featured article section --}}

    {{-- 📰 Latest Articles --}}
<section class="relative">
    <!-- Section Header with Decorative Elements -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <div class="flex flex-col">
                <h2 class="text-4xl font-bold text-gray-900">Latest News</h2>
                <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mt-2"></div>
            </div>
        </div>
        <div class="hidden md:flex items-center gap-2 text-gray-500">
            <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm font-medium">Just In</span>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $index => $article)
            <article class="group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2">
                <!-- Image Container with Overlay -->
                <div class="relative h-56 overflow-hidden bg-gray-200">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-100 to-purple-100">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                    @endif
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    
                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-gray-900 shadow-lg transform group-hover:scale-105 transition-transform duration-300">
                            <span class="w-2 h-2 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mr-2 animate-pulse"></span>
                            {{ $article->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>

                    <!-- New Badge for Recent Articles -->
                    @if($article->created_at->diffInHours(now()) < 24)
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-bold bg-red-500 text-white shadow-lg animate-bounce">
                                NEW
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Meta Information -->
                    <div class="flex items-center gap-4 mb-3 text-sm text-gray-500">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <span>{{ rand(100, 999) }}</span>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                        <a href="{{ route('public.show', $article->slug) }}" class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($article->content), 120) }}
                    </p>

                    <!-- Divider -->
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent mb-4"></div>

                    <!-- Read More Link -->
                    <a href="{{ route('public.show', $article->slug) }}"
                       class="inline-flex items-center gap-2 text-blue-600 font-semibold text-sm group/link hover:gap-3 transition-all duration-300">
                        <span>Read Full Story</span>
                        <svg class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>

                <!-- Decorative Corner -->
                <div class="absolute bottom-0 right-0 w-20 h-20 bg-gradient-to-tl from-blue-50 to-transparent rounded-tl-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </article>
        @endforeach
    </div>

    <!-- Loading More Indicator (Optional) -->
    {{-- <div class="mt-12 text-center">
        <button class="group relative inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 overflow-hidden">
            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            <span>Load More Articles</span>
            <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
    </div> --}}

    <!-- Background Decoration -->
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-20 -z-10"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-100 rounded-full blur-3xl opacity-20 -z-10"></div>

    <div class="mt-8">
    {{ $articles->links() }}
</div>

</section>


<style>
    /* Custom animations */
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

    article {
        animation: slideInUp 0.6s ease-out backwards;
    }

    article:nth-child(1) { animation-delay: 0.1s; }
    article:nth-child(2) { animation-delay: 0.2s; }
    article:nth-child(3) { animation-delay: 0.3s; }
    article:nth-child(4) { animation-delay: 0.4s; }
    article:nth-child(5) { animation-delay: 0.5s; }
    article:nth-child(6) { animation-delay: 0.6s; }

    /* Line clamp utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
</div>
@endsection
