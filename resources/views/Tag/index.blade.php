<x-layout :title="$pageTitle">
    <h1>Welcome To Tags Page</h1>
    @foreach($tags as $tag)
        <h1>{{ $tag->title }}</h1>
        
    @endforeach
</x-layout>
