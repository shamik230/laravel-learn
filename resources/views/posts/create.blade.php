<h1>Add post</h1>
<a href="{{route('posts.index')}}">Back to posts</a>
<hr>
<form action="{{route('posts.store')}}" method="POST">
    @csrf
    Title: <input type="text" name="title" id="title" value="{{old('title')}}"><br>
    Content: <textarea name="content" id="content">{{old('content')}}</textarea> <br>
    Price: <input type="text" name="price" id="price" value="{{old('price')}}"><br>
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