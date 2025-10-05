<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                {{-- Success Message --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Category Name</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Enter category name" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Description (optional)</label>
                        <textarea name="description" id="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Write a short description...">{{ old('description') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <a href="{{ route('categories.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- to show alread created categories --}}


    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
        {{ __('Previously Created Categories') }}
    </h2>


<div class="py-12">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">


            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">S.N</th>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Slug</th>
                        <th class="px-4 py-2 border">Description</th>
                        <th class="px-4 py-2 border text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-4 py-2 border">{{ $category->id }}</td>
                            <td class="px-4 py-2 border">{{ $category->name }}</td>
                            <td class="px-4 py-2 border text-gray-600">{{ $category->slug }}</td>
                            <td class="px-4 py-2 border">{{ $category->description ?? '-' }}</td>
                            <td class="px-4 py-2 border text-center">
                                <a href="{{ route('categories.edit', $category) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-app-layout>
