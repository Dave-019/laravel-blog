<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">            
                @csrf <!-- CSRF protection token -->

                        <!-- Title -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input id="title" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" required autofocus />
                        </div>

                        <!-- Slug -->
                        <div class="mt-4">
                            <label for="slug" class="block font-medium text-sm text-gray-700">Slug</label>
                            <input id="slug" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="slug" required />
                        </div>

                        <!-- Excerpt -->
                        <div class="mt-4">
                            <label for="excerpt" class="block font-medium text-sm text-gray-700">Excerpt</label>
                            <textarea id="excerpt" name="excerpt" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" required></textarea>
                        </div>

                        <!-- Body -->
                        <div class="mt-4">
                            <label for="body" class="block font-medium text-sm text-gray-700">Body</label>
                            <textarea id="body" name="body" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="10" required></textarea>
                        </div>
                            <div class="mt-4">
                            <label for="thumbnail" class="block font-medium text-sm text-gray-700">Thumbnail</label>
                            <input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>