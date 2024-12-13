@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dodaj nowy produkt</h1>

        <form action="{{ route('foods.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nazwa</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="calories" class="form-label">Kalorie</label>
                <input type="number" class="form-control" id="calories" name="calories" required>
            </div>

            <div class="mb-3">
                <label for="unit" class="form-label">Jednostka</label>
                <input type="text" class="form-control" id="unit" name="unit" required>
            </div>

            <button type="submit" class="btn btn-primary">Zapisz produkt</button>
        </form>
    </div>
@endsection
