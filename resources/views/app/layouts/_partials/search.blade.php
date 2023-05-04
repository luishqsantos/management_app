<div class="container-fluid">
    <form action="{{ $route ?? route(request()->route()->getname())}}" method="{{$method ?? 'get'}}" class="d-flex justify-content-end" role="search">
        <div class="mb-3">
            <div class="input-group">
                <input type="search" placeholder="Pesquisa" name="search" class="form-control" value="{{ request('search') ?? '' }}" aria-label="Search">
                <button class="btn btn-outline-secondary"><i data-feather="search"></i></button>
            </div>
        </div>
    </form>
</div>
