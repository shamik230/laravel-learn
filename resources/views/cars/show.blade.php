<x-layout.main title="Show car">
    <x-status/>
    <h3>{{$car->brand}} {{$car->model}}</h3>
    <p>{{$car->vin}}</p>
    <p>{{$categories[$car->category]}}</p>
    <p>{{$car->description}}</p>
    <x-form method='delete' :action="route('cars.destroy', [$car->id])">
        <button class="btn btn-danger">Delete</button>
    </x-form>
    <a href="{{route('cars.edit', [$car->id])}}">Edit</a> |
    <a href="{{route('cars.index')}}">Back</a>
</x-layout.main>