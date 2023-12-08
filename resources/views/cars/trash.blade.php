<x-layout.main title="Deleted cars page" h1="Cars">
    <a href="{{route('cars.index')}}">Index</a>
    <hr>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col m-3">
                <h3>{{$car->brand}} {{$car->model}}</h3>
                <p>{{$car->vin}}</p>
                <p>{{$categories[$car->category]}}</p>
                <p>{{$car->description}}</p>
                {{-- <a href="{{ route('cars.edit', [$car->id])}}">Edit</a> | --}}
                <a href="{{ route('cars.restore', [$car->id])}}">Restore</a>
            </div>
        @endforeach
    </div>
</x-layout.main>
