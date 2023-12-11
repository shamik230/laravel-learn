<x-layout.main title="Show car">
    <x-status/>
    <h3>{{$car->brand->title}} {{$car->model}}</h3>
    <p>{{$car->vin}}</p>
    <p>{{$categories[$car->category]}}</p>
    <p>{{$car->description}}</p>
    <ul>
        @foreach($car->tags as $tag)
            <li>{{ $tag->title }}</li>
        @endforeach
    </ul>
    <x-form method='delete' :action="route('cars.destroy', [$car->id])">
        <button class="btn btn-danger">Delete</button>
    </x-form>
    <a href="{{route('cars.edit', [$car->id])}}">Edit</a> |
    <a href="{{route('cars.index')}}">Back</a>
</x-layout.main>