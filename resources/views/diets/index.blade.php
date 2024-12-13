@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista diet</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('diets.create') }}" class="btn btn-primary mb-3">Dodaj nową dietę</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Posiłki</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diets as $diet)
                <tr>
                    <td>{{ $diet->name }}</td>
                    <td>{{ $diet->description }}</td>
                    <td>
                        <ul>
                            @foreach ($diet->meals as $meal)
                                <li>{{ $meal->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('diets.edit', $diet->id) }}" class="btn btn-warning">Edytuj</a>
                        <form action="{{ route('diets.destroy', $diet->id) }}" method="POST" style="display:inline;" 
                              onsubmit="return confirm('Czy na pewno chcesz usunąć tę dietę?');">
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
