<x-layout.main title="Index page" h1="Posts">
    <a href="{{route('posts.create')}}">Add post</a>
    <hr>
    @foreach ($posts as $item)
        <strong>{{$item->title}}</strong>
        <p>{{$item->content}}</p>
        <p>Price: {{$item->price}}</p>
        <a href="{{route('posts.show', $item->id)}}">Show post</a>
        <hr>
    @endforeach
</x-layout.main>
