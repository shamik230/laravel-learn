<x-layout.main title="Tags Upload" h1="Add new tag">
    <a href="{{route('tags.index')}}">Back to index</a>
    <x-form action="{{ route('tags.store') }}">
        @include('tags.form')
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>