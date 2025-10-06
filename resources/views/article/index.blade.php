<x-app-layout>
    {{-- to display the flash message --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif
    {{-- end of flash message --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! This is the articles index page.
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-5xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">📰 Latest News</h1>

        {{-- create new article button --}}
        <div class="mb-6">
            <a href="{{ route('articles.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                + Create New Article
            </a>

            @foreach ($articles as $article)
                <div class="mb-8 border-b pb-6">
                    @if($article->featured_image)
                        <img src="{{ $article->featured_image }}" alt="{{ $article->title }}"
                            class="w-full h-64 object-cover rounded-xl mb-4">
                    @endif

                    <h2 class="text-2xl font-semibold text-blue-700 hover:underline">
                        <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                    </h2>

                    <p class="text-gray-600 text-sm mb-2">
                        By <strong>{{ $article->user->name ?? 'Admin' }}</strong> •
                        {{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        {{ Str::limit($article->excerpt ?? strip_tags($article->content), 180) }}
                    </p>

                    <a href="{{ route('articles.show', $article->slug) }}"
                        class="text-blue-600 font-medium hover:underline mt-2 inline-block">
                        Read More →
                    </a>

                    {{-- Action buttons for the article owner or admin --}}
                    @if (auth()->check() && (auth()->user()->id === $article->user_id || auth()->user()->role === 'admin'))
                        <div class="mt-3 flex space-x-2">
                            {{-- Edit Button --}}
                            <a href="{{ route('articles.edit', $article->id) }}"
                                class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                Edit
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            @endforeach

            <div class="mt-6">
                {{ $articles->links() }}
            </div>
        </div>

</x-app-layout>