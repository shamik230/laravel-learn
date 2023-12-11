<x-layout.main title="Show tag">
    <x-status/>
    <h3>{{$tag->title}}</h3>
    {{-- @foreach($tag->cars as $car)
        <p>{{$car->id}} - {{$car->vin}}</p>
    @endforeach --}}
    <x-form method='delete' :action="route('tags.destroy', [$tag->id])">
        <button class="btn btn-danger">Delete</button>
    </x-form>
    <a href="{{route('tags.edit', [$tag->id])}}">Edit</a> |
    <a href="{{route('tags.index')}}">Back</a>
</x-layout.main>