<x-layout.main title="Car Upload" h1="Add new car">
    <a href="{{route('cars.index')}}">Back to index</a>
    <x-form action="{{ route('cars.store') }}">
        @include('cars.form')
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>