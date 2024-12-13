@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Utwórz nową dietę</h1>

    <form action="{{ route('diets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nazwa diety</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Wprowadź nazwę diety" required>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea name="description" id="description" class="form-control" rows="3" placeholder="Dodaj opis diety" required></textarea>
        </div>

        <div class="form-group">
            <label for="meals">Wybierz posiłki</label>
            <div id="meals-container">
                @foreach($meals as $meal)
                    <div class="form-check">
                        <input type="checkbox" name="meals[]" value="{{ $meal->id }}" id="meal_{{ $meal->id }}" class="form-check-input">
                        <label for="meal_{{ $meal->id }}" class="form-check-label">{{ $meal->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Utwórz dietę</button>
    </form>
</div>
@endsection