<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    // Wyświetlanie listy produktów
    public function index()
    {
        $foods = Food::paginate(10); // Zamiast all() używamy paginate() do paginacji
        return view('foods.index', compact('foods')); // Przekazujemy dane do widoku
    }

    public function create()
    {
        // Zwróć widok formularza tworzenia nowego produktu
        return view('foods.create');
    }


    public function edit($id)
    {
        // Pobierz produkt, który chcesz edytować
        $food = Food::findOrFail($id);

        // Zwróć widok z formularzem do edycji, przekazując produkt
        return view('foods.edit', compact('food'));
    }


    // Wyświetlanie pojedynczego produktu
    public function show($id)
    {
        return Food::findOrFail($id);
    }

    // Tworzenie nowego produktu
    public function store(Request $request)
    {
        // Walidacja danych (możesz dodać walidację, jeśli potrzebujesz)
        $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'nullable|integer',
            'unit' => 'nullable|string|max:10',
        ]);

        // Tworzenie nowego produktu
        $food = Food::create($request->all());

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('foods.index')->with('success', 'Produkt został dodany.');
    }


    // Aktualizacja istniejącego produktu
    public function update(Request $request, $id)
    {
        // Pobierz produkt
        $food = Food::findOrFail($id);

        // Zaktualizuj produkt danymi z formularza
        $food->update($request->all());

        // Zwróć odpowiedź po udanej aktualizacji
        return redirect()->route('foods.index')->with('success', 'Produkt zaktualizowany pomyślnie');
    }


    // Usuwanie produktu
    public function destroy($id)
    {
        // Pobierz produkt
        $food = Food::findOrFail($id);

        // Usuń produkt
        $food->delete();

        // Przekieruj z powrotem na stronę z listą produktów, z komunikatem o sukcesie
        return redirect()->route('foods.index')->with('success', 'Produkt został usunięty.');
    }


    
}
