@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edytuj produkt</h1>

        <form action="{{ route('foods.update', $food->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $food->name }}" required>
            </div>

            <div class="mb-3">
                <label for="calories" class="form-label">Kalorie</label>
                <input type="number" class="form-control" id="calories" name="calories" value="{{ $food->calories }}" required>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Jednostka</label>
                <input type="text" class="form-control" id="unit" name="unit" value="{{ $food->unit }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Zaktualizuj produkt</button>
        </form>
    </div>
@endsection
