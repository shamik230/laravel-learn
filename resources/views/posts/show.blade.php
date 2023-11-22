<h2>{{$post->title}}</h2>
<hr>
<h3>Price: {{$post->price}}</h3>
<p>{{$post->content}}</p>
<a href="{{route('posts.edit', $post->id)}}">Edit post</a> <br>
<form action="{{route('posts.destroy', $post->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete post</button>
</form>
<a href="{{route('posts.index')}}">Back to posts</a>
<p>ID: {{$post->id}}</p>