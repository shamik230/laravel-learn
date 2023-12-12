<x-layout.main title="Show car">
    <x-status/>
    <h3>{{$car->brand->title}} {{$car->model}}</h3>
    <strong>{{$car->status->text()}}</strong>
    <p>VIN {{$car->vin}}</p>
    <p>Category {{$categories[$car->category]}}</p>
    <p>Description {{$car->description}}</p>
    <ul>
        @foreach($car->tags as $tag)
            <li>{{ $tag->title }}</li>
        @endforeach
    </ul>
    @if($car->canDelete)
        <x-form method='delete' :action="route('cars.destroy', [$car->id])">
            <button class="btn btn-danger">Delete</button>
        </x-form>
    @endif
    <a href="{{route('cars.edit', [$car->id])}}">Edit</a> |
    <a href="{{route('cars.index')}}">Back</a>
</x-layout.main>