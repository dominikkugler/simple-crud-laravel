@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj dietę</h1>

    <form action="{{ route('diets.update', $diet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nazwa diety</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $diet->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Opis</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $diet->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="meals">Wybierz posiłki</label>
            <div id="meals-container">
                @foreach($meals as $meal)
                    <div class="form-check">
                        <input type="checkbox" name="meals[]" value="{{ $meal->id }}" id="meal_{{ $meal->id }}" class="form-check-input" 
                            {{ $diet->meals->contains($meal->id) ? 'checked' : '' }}>
                        <label for="meal_{{ $meal->id }}" class="form-check-label">{{ $meal->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Zaktualizuj dietę</button>
    </form>
</div>
@endsection