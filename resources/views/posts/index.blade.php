<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-8">
     <div class="mb-4">
        <form action="{{ route('posts.index') }}" method="GET">
            <div class="relative">
                <input type="text"
                       name="search"
                       placeholder="Search for posts..."
                       class="w-full rounded-md border-gray-300 shadow-sm pl-10 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       value="{{ request('search') }}">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </form>
    </div>
    @isset($pageTitle)
        <h1 class="text-3xl font-bold">{{ $pageTitle }}</h1>
    @endisset
    {{-- END ADD --}}

    @foreach ($posts as $post)
                    <article class="border-b border-gray-200 pb-8 last:border-b-0 last:pb-0">
                        @if ($post->thumbnail)
            <div class="w-1/3">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Post thumbnail" class="rounded-xl">
            </div>
        @endif

        <div class="{{ $post->thumbnail ? 'w-2/3' : 'w-full' }}">
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-500">{{ $post->title }}</a>
                        </h2>

                <div class="flex items-center space-x-2 text-sm text-gray-600 mb-2">
                <a href="{{ route('categories.show', $post->category) }}" class="font-semibold hover:text-blue-500">{{ $post->category->name }}</a>
                <span>&bull;</span>
                <p>By {{ $post->author->name }}</p>
            </div>

                        <p class="text-gray-600">
                            {{ $post->excerpt }}
                        </p>
                    </article>
                    @endforeach
                                   <div class="mt-4 flex items-center space-x-2">
        @foreach ($post->tags as $tag)
            <a href="#" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold hover:bg-blue-500 hover:text-white">
                {{ $tag->name }}
            </a>
        @endforeach
    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>