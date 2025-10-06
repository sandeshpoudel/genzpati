<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Full Article View') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                @if ($article->featured_image)
                    <img src="{{ $article->featured_image }}" alt="{{ $article->title }}" class="w-full h-96 object-cover">
                @endif

                <div class="p-8">
                    <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
                        {{ $article->title }}
                    </h1>

                    <div class="flex items-center space-x-4 text-sm text-gray-500 mb-8">
                        <span>👤 {{ $article->user->name ?? 'Admin' }}</span>
                        <span>•</span>
                        <span>{{ $article->published_at ? $article->published_at->format('F j, Y') : '' }}</span>
                        <span>•</span>
                        <span
                            class="bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full text-xs uppercase font-semibold">
                            {{ $article->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>

                    <div class="prose max-w-none text-gray-800 leading-relaxed text-lg">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <div class="mt-10 flex justify-between items-center border-t pt-6">
                        <a href="{{ route('articles.index') }}"
                            class="text-blue-600 hover:text-blue-800 font-semibold transition">
                            ← Back to News
                        </a>

                        @if (auth()->check() && (auth()->user()->id === $article->user_id || in_array(auth()->user()->role, ['admin', 'editor'])))
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
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>

                                {{-- Publish / Unpublish Button --}}
                                @if(in_array(auth()->user()->role, ['admin', 'editor']))
                                    <form action="{{ route('articles.toggleStatus', $article->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if($article->status === 'published')
                                            <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                                Unpublish
                                            </button>
                                        @else
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                                                Publish
                                            </button>
                                        @endif
                                    </form>
                                @endif

                            </div>
                        @endif


                        <div class="text-sm text-gray-500">
                            Last updated {{ $article->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
</x-app-layout>