<h1>Posts page</h1>
<hr>
@foreach ($posts as $item)
    <h2>{{ $item['title'] }}</h2>
    <p>{{ $item['content'] }}</p>
    <hr>
@endforeach