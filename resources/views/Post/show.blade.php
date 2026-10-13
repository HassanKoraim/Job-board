<x-layout :title="$pageTitle">
    <h1>Welcome To show Page</h1>
    <h1>title of the Post: {{$post->title }}</h1>
    <h2>Author of the Post: {{ $post->author }}</h2>
    @foreach ($post->comments as $comment )
        <p>{{ $comment->content }}</p>
        <p>{{ $comment->author }}</p>
    @endforeach
    <h1>Tags</h1>
    @foreach ($tags as $tag)
        <p>{{ $tag -> title }}</p>
    @endforeach
</x-layout>
