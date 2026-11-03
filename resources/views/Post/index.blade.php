<x-layout :title="$pageTitle">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <!-- Button container aligned to the right -->
    <div class="flex justify-end mb-6">
        <a href="/blogs/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Post
        </a>
    </div>
@foreach($posts as $post)
    <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <!-- Title & Author -->
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-1">
            <a href="/blogs/{{ $post->id }}" class="hover:underline">{{ $post->title }}</a>
        </h2>
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4">
            By {{ $post->author }}
        </p>

        <!-- Body & Comment -->
        {{-- 
        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $post->body }}</p> 
        <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
            @foreach ($post->comments as $comment)
                <p class="text-xs text-gray-600 dark:text-gray-400">comment: {{ $comment->content }}</p>
            @endforeach
        </div>
        --}}

        <!-- Action Buttons -->
        <div class="flex items-center gap-3 mt-4"> 
            <!-- Edit Link -->
            <a href="/blogs/{{ $post->id }}/edit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Edit
            </a>

            <!-- Delete Form -->
            <form action="/blogs/{{ $post->id }}"
             method="POST"
             onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" 
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endforeach

    {{ $posts->links() }}
</x-layout>
