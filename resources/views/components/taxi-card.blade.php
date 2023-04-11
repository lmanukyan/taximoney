<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $taxi->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $taxi->price }} руб.</h6>
        <form action="{{ route('taxi.buy', ['taxi' => $taxi->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
            <button type="submit" class="btn btn-primary">Купить</button>
        </form>
    </div>
</div>
