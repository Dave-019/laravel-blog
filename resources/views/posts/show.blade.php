<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

        <article>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $post->title }}</h1>

<div class="flex items-center space-x-2 text-lg font-semibold text-gray-700 mb-4">
<a href="{{ route('categories.show', $post->category) }}" class="hover:underline">{{ $post->category->name }}</a>
    <span>&bull;</span>
    <p>By {{ $post->author->name }}</p>
</div>

            <div class="prose lg:prose-xl max-w-none">
                <p>{{ $post->body }}</p>
            </div>
<div class="mt-6 flex items-center space-x-2">
    @foreach ($post->tags as $tag)
        <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-500 hover:text-white">
            {{ $tag->name }}
        </a>
    @endforeach
</div>
        </article>
    <hr class="my-8">
    <x-comment-section :post="$post" />
                    <a href="{{ route('posts.index') }}" class="mt-8 inline-block text-blue-500 hover:underline">&larr; Back to Posts</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>