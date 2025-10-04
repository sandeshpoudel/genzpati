<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Posts') }}
        </h2>
    </x-slot>

    @foreach ($posts as $post)
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Content -->
                    <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
                    <h2 class="text-1xl mb-2">{{ $post->content }}</h2>
                </div>
            </a>
        </div>
    </div>
    </div>
        
    @endforeach
</x-app-layout>