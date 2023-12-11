<x-layout.main title="Index page" h1="Brands">
    <x-status/>
    <a href="{{route('brands.create')}}">Add brand</a> |
    <a href="{{route('cars.index')}}">Back to cars</a>
    <hr>
    @if($brands->isEmpty())
        <div class="alert alert-info">There is no brands. Add one.</div>
    @endif
    <div class="row">
        @foreach ($brands as $brand)
            <div class="col m-3">
                <h3>{{$brand->title}}</h3>
                <a href="{{ route('brands.edit', [$brand->id])}}">Edit</a> |
                <a href="{{ route('brands.show', [$brand->id])}}">View</a>
            </div>
        @endforeach
    </div>
</x-layout.main>
