<x-layout.main title="Brand Update" h1="Edit brand">
    <a href="{{route('brands.index')}}">Back to index</a>
    <x-form action="{{ route('brands.update', [$brand->id]) }}" method="put">
        @bind($brand)
            @include('brands.form')
        @endbind
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>