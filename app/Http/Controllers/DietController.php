<?php

namespace App\Http\Controllers;

use App\Models\Diet;
use App\Models\Meal;
use Illuminate\Http\Request;

class DietController extends Controller
{
    // Wyświetlanie listy diet
    public function index()
    {
        $diets = Diet::with('meals')->get();
        return view('diets.index', compact('diets'));
    }

    // Wyświetlanie formularza tworzenia nowej diety
    public function create()
    {
        $meals = Meal::all();
        return view('diets.create', compact('meals'));
    }

    // Tworzenie nowej diety
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meals' => 'array',
            'meals.*' => 'exists:meals,id',
        ]);

        $diet = Diet::create($validated);

        if (isset($validated['meals'])) {
            $diet->meals()->sync($validated['meals']);
        }

        return redirect()->route('diets.index')->with('success', 'Dieta została utworzona.');
    }

    // Wyświetlanie formularza edycji diety
    public function edit($id)
    {
        $diet = Diet::with('meals')->findOrFail($id);
        $meals = Meal::all();
        return view('diets.edit', compact('diet', 'meals'));
    }

    // Aktualizacja istniejącej diety
    public function update(Request $request, $id)
    {
        $diet = Diet::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meals' => 'array',
            'meals.*' => 'exists:meals,id',
        ]);

        $diet->update($validated);

        if (isset($validated['meals'])) {
            $diet->meals()->sync($validated['meals']);
        } else {
            $diet->meals()->detach();
        }

        return redirect()->route('diets.index')->with('success', 'Dieta została zaktualizowana.');
    }

    // Usuwanie diety
    public function destroy($id)
    {
        $diet = Diet::findOrFail($id);
        $diet->meals()->detach();
        $diet->delete();

        return redirect()->route('diets.index')->with('success', 'Dieta została usunięta.');
    }
}
