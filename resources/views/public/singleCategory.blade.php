@extends('layouts.public')

@section('title', $categoryForDisplay->name . ' News')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-10">
        <!-- Category Title -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $categoryForDisplay->name }}</h1>
            <p class="text-gray-500 mt-2">Latest news and updates from {{ $categoryForDisplay->name }}</p>
        </div>

        <!-- Articles Grid -->
        @if($articles->count())
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <a href="{{ route('public.show', $article->slug) }}">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}"
                                    class="w-full h-48 object-cover">
                            @else
                                <img src="{{ asset('images/default-article.jpg') }}" alt="Default Image"
                                    class="w-full h-48 object-cover opacity-50">
                            @endif

                            <div class="p-4">
                                <h2 class="text-lg font-semibold text-gray-800 line-clamp-2">
                                    {{ $article->title }}
                                </h2>
                                <p class="text-sm text-gray-500 mt-2">
                                    {{ $article->created_at->format('M d, Y') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $articles->links() }}
            </div>
        @else
            <div class="text-center text-gray-500 text-lg">
                No articles found in this category yet.
            </div>
        @endif
    </div>
@endsection