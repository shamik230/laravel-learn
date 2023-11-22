<x-layout.main title="New post" h1="Add new post">
    <a href="{{route('posts.index')}}">Back to posts</a>
    <hr>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <x-input label="Title" name="title"/>
        <x-textarea label="Content" name="content"/>
        <x-input label="Price" name="price"/>
        <hr>
        <input type="submit" value="Send">
    </form>
</x-layout.main>