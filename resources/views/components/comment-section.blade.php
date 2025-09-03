@props(['post'])

<section class="space-y-6">
    @auth
        <form method="POST" action="{{ route('comments.store', $post) }}">
            @csrf
            <textarea name="body" rows="5" placeholder="Leave a comment..."
                      class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
            <div class="flex justify-end mt-2">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Post Comment</button>
            </div>
        </form>
    @else
        <p class="font-semibold">
            <a href="{{ route('login') }}" class="underline hover:text-blue-500">Log in</a> to leave a comment.
        </p>
    @endauth

    <h2 class="text-2xl font-bold">Comments</h2>

    @forelse ($post->comments->sortByDesc('created_at') as $comment)
        <article class="p-6 bg-gray-50 border border-gray-200 rounded-lg">
            <div class="flex items-center space-x-4">
                <div class="font-semibold">{{ $comment->author->name }}</div>
                <div class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
            <p class="mt-4 text-gray-700">{{ $comment->body }}</p>
        </article>
    @empty
        <p>No comments yet.</p>
    @endforelse
</section>