<div class="container-fluid">
    <form action="{{$route ?? url()->full()}}" method="{{ $method ?? 'get' }}" class="d-flex justify-content-end" role="search">
        <div class="mb-3">
            @foreach (request()->query() as $key => $value)
                @if ($key !== 'search')
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endif
            @endforeach
            <div class="input-group">
                <input type="search" placeholder="Pesquisa" name="search" class="form-control"
                    value="{{ request('search') ?? '' }}" aria-label="Search">
                <button type="submit" class="btn btn-outline-secondary"><i data-feather="search"></i></button>
            </div>
        </div>
    </form>
</div>
