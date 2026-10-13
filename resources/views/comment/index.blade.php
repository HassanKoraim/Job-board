<x-layout :title="$pageTitle">
    <h1>Welcome To comments Page</h1>
    @foreach($comments as $comment)
        <h1>{{ $comment->content }}</h1>
        <p>{{ $comment->author }}</p>
         <p>{{ $comment->post->title }}</p>
    @endforeach
    {{ $comments ->links() }}
</x-layout>
