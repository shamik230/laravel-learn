<x-layout.main title="Index page" h1="Cars">
    <x-status/>
    <a href="{{route('cars.create')}}">Add car</a>
    <a href="{{route('cars.trash')}}">Trash can</a>
    <hr>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col m-3">
                <h3>{{$car->brand}} {{$car->model}}</h3>
                <a href="{{ route('cars.edit', [$car->id])}}">Edit</a> |
                <a href="{{ route('cars.show', [$car->id])}}">View</a>

            </div>
        @endforeach
    </div>
</x-layout.main>
