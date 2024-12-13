@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista posiłków</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('meals.create') }}" class="btn btn-primary mb-3">Dodaj nowy posiłek</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Produkty (ilość)</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                <tr>
                    <td>{{ $meal->name }}</td>
                    <td>{{ $meal->description }}</td>
                    <td>
                        @foreach ($meal->foods as $food)
                            {{ $food->name }} ({{ $food->pivot->quantity }}),
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-warning">Edytuj</a>
                        <form action="{{ route('meals.destroy', $meal->id) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('Czy na pewno chcesz usunąć ten posiłek?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
