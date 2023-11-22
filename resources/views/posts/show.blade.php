<x-layout.main title="Post" h1="{{$post->title}}">
    <p>{{$post->content}}</p>
    <h3>Price: {{$post->price}}</h3>
    <a href="{{route('posts.edit', $post->id)}}">Edit post</a> <br>
    <form action="{{route('posts.destroy', $post->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete post</button>
    </form>
    <a href="{{route('posts.index')}}">Back to posts</a>
    <p>ID: {{$post->id}}</p>
</x-layout.main>