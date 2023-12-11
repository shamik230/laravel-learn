<x-layout.main title="Brand Upload" h1="Add new brand">
    <a href="{{route('brands.index')}}">Back to index</a>
    <x-form action="{{ route('brands.store') }}">
        @include('brands.form')
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>