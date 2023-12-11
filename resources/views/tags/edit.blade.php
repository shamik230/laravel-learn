<x-layout.main title="Tag Update" h1="Edit tag">
    <a href="{{route('tags.index')}}">Back to index</a>
    <x-form action="{{ route('tags.update', [$tag->id]) }}" method="put">
        @bind($tag)
            @include('tags.form')
        @endbind
        <button class="btn btn-success">Save</button>
    </x-form>
</x-layout.main>