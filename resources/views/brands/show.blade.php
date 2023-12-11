<x-layout.main title="Show brand">
    <x-status/>
    <h3>{{$brand->title}}</h3>
    @foreach($brand->cars as $car)
        <p>{{$car->id}} - {{$car->vin}}</p>
    @endforeach
    <x-form method='delete' :action="route('brands.destroy', [$brand->id])">
        <button class="btn btn-danger">Delete</button>
    </x-form>
    <a href="{{route('brands.edit', [$brand->id])}}">Edit</a> |
    <a href="{{route('brands.index')}}">Back</a>
</x-layout.main>