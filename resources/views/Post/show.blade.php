<x-layout :title="$pageTitle">
    <div class="max-w-3xl mx-auto space-y-8">

        <!-- Main Post Card -->
        <article class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white mb-2">
                {{ $post->title }}
            </h1>
            
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <span>By <strong class="text-gray-700 dark:text-gray-300">{{ $post->author }}</strong></span>
            </div>

            <!-- Post Content Body -->
            @if(isset($post->body))
                <div class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                    {{ $post->body }}
                </div>
            @endif

            <!-- Tags (If Available) -->
            @if(isset($tags) && count($tags) > 0)
                <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-100 dark:border-gray-700">
                    @foreach ($tags as $tag)
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            #{{ $tag->title }}
                        </span>
                    @endforeach
                </div>
            @endif
        </article>

        <!-- Comments Card -->
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <!-- Comments Count Header -->
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                <span>Comments</span>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                    {{ $post->comments->count() }}
                </span>
            </h2>

            <!-- Existing Comments List -->
            <div class="space-y-4 mb-8">
                @forelse ($post->comments as $comment)
                    <div class="p-4 bg-gray-50 rounded-lg border border-gray-100 dark:bg-gray-700/50 dark:border-gray-700">
                        <div class="flex items-center justify-between mb-1">
                            <span class="font-semibold text-sm text-gray-900 dark:text-white">
                                {{ $comment->author }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $comment->content }}
                        </p>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">
                        No comments yet. Be the first to share your thoughts!
                    </p>
                @endforelse
            </div>

            <!-- Comment Form -->
            <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Leave a Comment</h3>
                
                <form method="POST" action="/comments" class="space-y-4">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">

                    <!-- Author Input -->
                    <div>
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                        <input type="text" 
                               name="author" 
                               id="author" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                               placeholder="Your name..." 
                               required>
                    </div>

                    <!-- Content Textarea -->
                    <div>
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                        <textarea name="content" 
                                  id="content" 
                                  rows="3" 
                                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                                  placeholder="Write your comment here..." 
                                  required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit Comment
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-layout>