<x-layout.main title="Edit post" h1="Edit post">
    <a href="{{route('posts.show', $post->id)}}">Back to post</a>
    <hr>
    <form action="{{route('posts.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        <x-input label="Title" name="title" default-value="{{$post->title}}"/>
        <x-textarea label="Content" name="content" default-value="{{$post->content}}"/>
        <x-input label="Price" name="price" default-value="{{$post->price}}"/>
        <x-select label="Category" name="category" :items="$items" :default-value="$post->category"/>
        <input type="submit" value="Send">
        <hr>
    </form>
</x-layout.main>