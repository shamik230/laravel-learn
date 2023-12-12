<x-layout.main title="Index page" h1="Cars">
    <x-status/>
    <div class="row">
        @foreach ($cars as $car)
            <div class="col m-3">
                <h3>{{$car->brand->title}} {{$car->model}}</h3>
                <p>{{$car->status->text()}}</p>
                <a href="{{ route('cars.show', [$car->id])}}">View</a>
            </div>
        @endforeach
    </div>
</x-layout.main>
