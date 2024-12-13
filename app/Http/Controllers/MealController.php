<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Food;
use Illuminate\Http\Request;

class MealController extends Controller
{
    // Wyświetlanie listy posiłków
    public function index()
    {
        $meals = Meal::with('foods')->get();
        return view('meals.index', compact('meals'));
    }

    // Wyświetlanie formularza tworzenia nowego posiłku
    public function create()
    {
        $foods = Food::all();
        return view('meals.create', compact('foods'));
    }

    // Przechowywanie nowego posiłku
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'foods.*.id' => 'nullable|exists:foods,id',
            'foods.*.quantity' => 'nullable|numeric|min:0',
        ]);

        $meal = Meal::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        // Dodawanie produktów do posiłku
        if (!empty($validatedData['foods'])) {
            foreach ($validatedData['foods'] as $foodData) {
                if (!empty($foodData['quantity']) && $foodData['quantity'] > 0) {
                    $meal->foods()->attach($foodData['id'], ['quantity' => $foodData['quantity']]);
                }
            }
        }

        return redirect()->route('meals.index')->with('success', 'Posiłek został utworzony.');
    }

    // Wyświetlanie formularza edycji posiłku
    public function edit($id)
    {
        $meal = Meal::with('foods')->findOrFail($id);
        $foods = Food::all();
        $foodQuantities = $meal->foods->pluck('pivot.quantity', 'id')->toArray();

        return view('meals.edit', compact('meal', 'foods', 'foodQuantities'));
    }

    // Aktualizacja istniejącego posiłku
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'foods.*.id' => 'nullable|exists:foods,id',
            'foods.*.quantity' => 'nullable|numeric|min:0',
        ]);

        $meal = Meal::findOrFail($id);
        $meal->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        // Synchronizacja produktów
        $foodsToSync = [];
        if (!empty($validatedData['foods'])) {
            foreach ($validatedData['foods'] as $foodData) {
                if (!empty($foodData['quantity']) && $foodData['quantity'] > 0) {
                    $foodsToSync[$foodData['id']] = ['quantity' => $foodData['quantity']];
                }
            }
        }
        $meal->foods()->sync($foodsToSync);

        return redirect()->route('meals.index')->with('success', 'Posiłek został zaktualizowany.');
    }

    // Usuwanie posiłku
    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->foods()->detach();
        $meal->delete();

        return redirect()->route('meals.index')->with('success', 'Posiłek został usunięty.');
    }
}
