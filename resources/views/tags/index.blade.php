<x-layout.main title="Index page" h1="Tags">
    <x-status/>
    <a href="{{route('tags.create')}}">Add tag</a> |
    <a href="{{route('cars.index')}}">Back to cars</a>
    <hr>
    @if($tags->isEmpty())
        <div class="alert alert-info">There is no tags. Add one.</div>
    @endif
    <div class="row">
        @foreach ($tags as $tag)
            <div class="col m-3">
                <h3>{{$tag->title}}</h3>
                <a href="{{ route('tags.edit', [$tag->id])}}">Edit</a> |
                <a href="{{ route('tags.show', [$tag->id])}}">View</a>
            </div>
        @endforeach
    </div>
</x-layout.main>
