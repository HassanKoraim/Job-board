<x-layout :title="$pageTitle">
    <div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Welcome To {{ $pageTitle }}</h1>
        
        <form class="space-y-4" method="post" action="/blogs/{{ $post->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $post->id }}">

            <!-- Title & Author Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" 
                           name="title" 
                           value="{{ old('title', $post->title) }}" 
                           id="inputtitle" 
                           class="{{ $errors->has('title') ? 'outline outline-2 outline-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                           placeholder="Title">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>              
                
                <div>
                    <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                    <input type="text" 
                           name="author"
                           value="{{ old('author', $post->author) }}"
                           id="inputAuthor4" 
                           class="{{ $errors->has('author') ? 'outline outline-2 outline-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                           placeholder="Author">
                    @error('author')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Body / Content -->
            <div>
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <input type="text" 
                       name="body" 
                       value="{{ old('body', $post->body) }}" 
                       id="inputContent"
                       class="{{ $errors->has('body') ? 'outline outline-2 outline-red-500 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-blue-500 focus:border-blue-500' }} bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                       placeholder="Write your content here...">
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Select Tags Section -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Tags</label>
                <div class="flex flex-wrap gap-2">
                    @foreach($tags as $tag)
                        <div>
                            <input type="checkbox" 
                                   id="tag-{{ $tag->id }}" 
                                   name="tags[]" 
                                   value="{{ $tag->id }}" 
                                   class="hidden peer"
                                   {{ (is_array(old('tags')) ? in_array($tag->id, old('tags')) : $post->tags->contains($tag->id)) ? 'checked' : '' }}>
                            
                            <label for="tag-{{ $tag->id }}" 
                                   class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold cursor-pointer border border-gray-300 bg-gray-100 text-gray-700 transition-colors duration-150 ease-in-out hover:bg-gray-200 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600 dark:peer-checked:bg-blue-600 dark:peer-checked:text-white dark:peer-checked:border-blue-600">
                                #{{ $tag->title }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('tags')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Published Checkbox -->
            <div class="flex items-center pt-2">
                <input id="gridCheck" 
                       type="checkbox" 
                       {{ (old('published') || (!old() && $post->published)) ? 'checked' : '' }} 
                       name="published" 
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
                <label for="gridCheck" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is published?</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Update Post
            </button>
        </form> 
    </div>
</x-layout>