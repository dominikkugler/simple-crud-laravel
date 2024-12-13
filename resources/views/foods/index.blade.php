@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista produktów</h1>

        <a href="{{ route('foods.create') }}" class="btn btn-primary mb-3">Dodaj nowy produkt</a>

        <!-- Tabela z produktami -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>Kalorie</th>
                    <th>Jednostka</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($foods as $food)
                    <tr>
                        <td>{{ $food->id }}</td>
                        <td>{{ $food->name }}</td>
                        <td>{{ $food->calories }}</td>
                        <td>{{ $food->unit }}</td>
                        <td>
                            <!-- Przycisk do edytowania -->
                            <a href="{{ route('foods.edit', $food->id) }}" class="btn btn-warning btn-sm">Edytuj</a>

                            <!-- Formularz do usuwania -->
                            <form action="{{ route('foods.destroy', $food->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Czy na pewno chcesz usunąć ten produkt?')">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Link do paginacji -->
        {{ $foods->links() }}
    </div>
@endsection
