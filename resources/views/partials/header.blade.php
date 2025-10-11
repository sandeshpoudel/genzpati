<header class="bg-white shadow">
    <div class="container mx-auto flex justify-between items-center p-4">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">
            GenZ Pati
        </a>

        <nav>
            <ul class="flex space-x-6 text-gray-700">
                <li><a href="{{ url('/') }}" class="hover:text-indigo-500">Home</a></li>

                {{-- Loop through categories dynamically --}}
                @foreach($categories ?? [] as $category)
                    <li>
                        <a href="{{ route('category.show', $category->slug) }}" 
                           class="hover:text-indigo-500">
                           {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
