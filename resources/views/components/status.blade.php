@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('statusDanger'))
    <div class="alert alert-danger">
        {{ session('statusDanger') }}
    </div>
@endif