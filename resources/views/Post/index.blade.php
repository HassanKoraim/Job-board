<x-layout :title="$pageTitle">
    <h1>Welcome To Blog Page</h1>
    <!-- {{$i = 0  }} -->
    @foreach($posts as $post)
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <p>{{ $post->author }}</p>
        @foreach ($post->comments as $comment )
            <p>comment: {{ $comment->content }}</p>
        @endforeach
    @endforeach
    {{ $posts->links() }}
</x-layout>


