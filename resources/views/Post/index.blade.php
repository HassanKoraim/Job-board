<x-layout :title="$pageTitle">
    <h1>Welcome To Blog Page</h1>
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
    
    @endforeach
</x-layout>
