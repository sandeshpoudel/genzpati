@extends('layouts.public')

@section('title', $article->title)

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-4">
        <a href="{{ url('/') }}" class="hover:underline">Home</a> /
        <a href="{{ route('public.show', $article->category->slug) }}" class="hover:underline">
            {{ $article->category->name }}
        </a> /
        <span class="text-gray-700">{{ $article->title }}</span>
    </div>

    <!-- Featured Image -->
    @if($article->featured_image)
        <img src="{{ asset('storage/' . $article->featured_image) }}" 
             alt="{{ $article->title }}"
             class="w-full h-auto rounded-xl mb-6 shadow-lg object-cover">
    @endif

    <!-- Title -->
    <h1 class="text-4xl font-bold text-gray-900 mb-3 leading-tight">
        {{ $article->title }}
    </h1>

    <!-- Meta Info -->
    <div class="flex items-center text-gray-500 text-sm mb-8 space-x-4">
        <span>By <span class="font-semibold text-gray-700">{{ $article->user->name ?? 'Admin' }}</span></span>
        <span>•</span>
        <span>{{ $article->created_at->format('M d, Y') }}</span>
        <span>•</span>
        <span class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded-md text-xs uppercase font-semibold">
            {{ $article->category->name }}
        </span>
    </div>

    <!-- Article Content -->
    <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
        {!! $article->content !!}
    </div>

    <!-- Tags -->
    @if($article->tags && $article->tags->count())
        <div class="mt-8 flex flex-wrap gap-2">
            @foreach($article->tags as $tag)
                <a href="{{ route('public.show', $tag->slug) }}" 
                   class="text-sm bg-gray-100 text-gray-600 px-3 py-1 rounded-full hover:bg-gray-200">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    @endif

    <!-- Related Articles -->
    @if(isset($relatedArticles) && $relatedArticles->count())
        <div class="mt-12 border-t border-gray-200 pt-8">
            <h2 class="text-2xl font-semibold mb-5">Related Articles</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach($relatedArticles as $related)
                    <div class="bg-white shadow-md rounded-xl overflow-hidden hover:shadow-lg transition">
                        <a href="{{ route('public.show', $related->slug) }}">
                            @if($related->featured_image)
                                <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                     alt="{{ $related->title }}" 
                                     class="w-full h-40 object-cover">
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 line-clamp-2">
                                    {{ $related->title }}
                                </h3>
                                <p class="text-sm text-gray-500 mt-2">{{ $related->created_at->format('M d, Y') }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
