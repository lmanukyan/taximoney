@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Магазин</h3>
            @foreach ($taxis as $taxi)
                <div class="col-md-4 mb-3">
                    <x-taxi-card :taxi="$taxi"/>
                </div>
            @endforeach
        </div>
    </div>
@endsection
