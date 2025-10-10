<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Display Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="list-disc text-red-600 text-sm pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Update Form --}}
                    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- important for update --}}

                        {{-- Title --}}
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" 
                                value="{{ old('title', $article->title) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                        </div>

                        {{-- Slug --}}
                        <div class="mb-4">
                            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" 
                                value="{{ old('slug', $article->slug) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        {{-- Category --}}
                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category_id" id="category_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Content --}}
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="6"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                >{{ old('content', $article->content) }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                <option value="">-- Select Status --</option>
                                <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="pending" {{ old('status', $article->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                        </div>

                        {{-- featured image --}}
                        <div class="mb-4">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700">Upload Featured
                                Image</label>
                            <input type="file" name="featured_image" id="featured_image"
                                class="mt-1 block w-full text-sm text-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

                            @if($article->featured_image)
                            <img src="{{ article_image_url($article->featured_image) }}" 
                                alt="{{ $article->title }}" 
                                class="w-full h-64 object-cover rounded-xl mb-4">
                            @endif
                        </div>
                        {{-- end of featured image --}}
                        {{-- Input for tags --}}
                        <div class="mb-4">
                            <label for="tags" class="block text-sm font-medium text-gray-700">Tags (comma separated)</label>
                            <input type="text" name="tags" id="tags" value="{{ $article->tags->pluck('name')->implode(', ') }}"
                                class="mt-1 mb-4 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="e.g. Laravel, PHP, Web Development">
                        {{-- End of tags --}}
                        {{-- Buttons --}}
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('articles.index') }}"
                               class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:ring-4 focus:ring-gray-300">
                                Back to Articles
                            </a>

                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                                Update Article
                            </button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let editorInstance;

    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Handle form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        // Make sure editor data is written back into textarea
        if (editorInstance) {
            document.querySelector('#content').value = editorInstance.getData();
        }
    });
});
</script>