<h1>Edit post</h1>
<a href="{{route('posts.show', $post->id)}}">Back to post</a>
<hr>
<form action="{{route('posts.update', $post->id)}}" method="POST">
    @csrf
    @method('PUT')
    Title: <input type="text" name="title" id="title" value="{{$post->title}}"><br>
    Content: <textarea name="content" id="content">{{$post->content}}</textarea> <br>
    Price: <input type="text" name="price" id="price" value="{{$post->price}}"><br>
    <input type="submit" value="Send">
    <hr>
    @if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>