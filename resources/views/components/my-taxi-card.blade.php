<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $taxi->original->name }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $taxi->price }} руб.</h6>
        <form action="{{ route('taxi.changeColor') }}" method="POST">
            @csrf
            {{ $slot }}
            <input type="hidden" name="taxi_id" value="{{ $taxi->id }}">
            <button type="submit" class="btn btn-primary">Изменить цвет</button>
        </form>
    </div>
</div>
