@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Utwórz nowy posiłek</h1>

    <form action="{{ route('meals.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nazwa posiłku</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Wprowadź nazwę posiłku" required>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Dodaj opis posiłku" required></textarea>
        </div>

        <div class="form-group">
            <label for="foods">Wybierz produkty i ilości</label>
            <div id="foods-container">
                @foreach($foods as $food)
                    <div class="food-item form-row">
                        <div class="col">
                            <label for="food_{{ $food->id }}">{{ $food->name }}</label>
                            <input type="hidden" name="foods[{{ $food->id }}][id]" value="{{ $food->id }}">
                        </div>
                        <div class="col">
                            <input type="number" name="foods[{{ $food->id }}][quantity]" class="form-control" 
                                value="0" min="0">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Utwórz posiłek</button>
    </form>
</div>
@endsection
