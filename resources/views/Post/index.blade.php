<x-layout :title="$pageTitle">
    @php
        $userRole = auth()->user()->role;
    @endphp
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if(session('fail'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            {{ session('fail') }}
        </div>
    @endif
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Blog Posts</h1>
        @if(in_array($userRole, ['admin', 'editor']))
            <a href="/blogs/create" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create Post
            </a>
        @endif
    </div>

    <!-- Handles both populated posts and empty state -->
    @forelse($posts as $post)
        <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white mb-1">
                <a href="/blogs/{{ $post->id }}" class="hover:underline">{{ $post->title }}</a>
            </h2>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4">
                By <span class="font-semibold text-gray-900 dark:text-white">{{ $post->user->name }}</span> on {{ $post->created_at->format('F j, Y') }}
            </p>

            <div class="flex items-center gap-3">
                <!-- Edit only, Admin && Editor Owner -->
                @can('update',$post)
                <!-- @if(in_array($userRole,['admin','editor'])) -->
                    <a href="/blogs/{{ $post->id }}/edit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700">
                        Edit
                    </a>
                <!-- @endif -->
                @endcan
                <!-- @if($userRole === 'admin') -->
                @can('delete',$post)
                    <form action="/blogs/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                @endcan
                <!-- @endif -->
            </div>
        </div>
    @empty
        <!-- Empty State UI -->
        <div class="p-8 text-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">No posts found.</p>
            <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">Get started by creating your first post!</p>
        </div>
    @endforelse

    <!-- Safe to render links even if $posts is empty -->
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-layout>