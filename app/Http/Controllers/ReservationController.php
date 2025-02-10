<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('car')->get();
        return view('reservations.index', compact('reservations'));
    }
    public function create()
    {
        $cars = Car::all();
        return view('reservations.create', compact('cars'));
    }
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        // Ajout d'un user_id par défaut (par exemple, 1)
        $validatedData['user_id'] = 1; // Remplacez 1 par l'ID d'un utilisateur par défaut
        // Créer une nouvelle réservation avec les données validées 
        Reservation::create($validatedData);
        // Rediriger l'utilisateur vers une autre page, par exemple la liste des réservations
        return redirect()->route('reservations.index');
    }
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }
    public function edit(Reservation $reservation)
    {
        $cars = Car::all();
        return view('reservations.edit', compact('reservation', 'cars'));
    }
    public function update(Request $request, Reservation $reservation)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
        $reservation->update($validatedData);
        return redirect()->route('reservations.index');
    }
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index');
    }
}
