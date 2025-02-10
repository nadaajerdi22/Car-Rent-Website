<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
        public function index()
    {
        // Récupérer toutes les voitures depuis la base de données
        $cars = Car::all();
        // Retourner la vue 'cars.index' en passant les voitures récupérées comme données
        return view('cars.index', compact('cars'));
    }

    // Méthode pour afficher le formulaire de création de voiture
    public function create()
    {
        // Retourner la vue 'cars.create' pour créer une nouvelle voiture
        return view('cars.create');
    }
    public function store(Request $request)
    {
        // Valide les données de la requête. Chaque champ doit respecter les règles spécifiées 
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'image' => 'required|image', 
            'description' => 'required|string', 
            'price_per_day' => 'required|numeric|min:0',
        ]); 

        // Stocker l'image dans le répertoire public 
        $path = $request->file('image')->store('images', 'public');

        // creer une nouvelle voiture avec les donnees validees 
        $car = new Car();
        $car->make = $validatedData['make'];
        $car->model = $validatedData['model'];
        $car->description = $validatedData['description'];
        $car->image = $path;
        $car->price_per_day = $validatedData['price_per_day'];
        $car->save();

        return redirect()->route('cars.create')->with('success', 'Car created successfully!'); 
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }    
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }  
    public function update(Request $request,Car $car)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'price_per_day' => 'required|numeric|min:0',
        ]);   
     // Mettre à jour l'image si une nouvelle image est téléchargée
     if ($request->hasFile('image')) {
        $path = $request->file('image')->store('images', 'public');
        $car->image = $path;
    }

    // Mettre à jour les autres données de la voiture avec les données validées
    $car->update($validatedData);
    // Rediriger vers la page d'index des voitures
    return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
}
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}