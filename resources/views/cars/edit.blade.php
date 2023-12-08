<x-layout.main title="Car Update" h1="Edit car">
    <a href="{{route('cars.index')}}">Back to index</a>
    <x-form action="{{ route('cars.update', [$car->id]) }}" method="put">
        @bind($car)
            @include('cars.form')
        @endbind
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>