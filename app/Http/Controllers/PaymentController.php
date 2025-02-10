<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    // Affiche la liste des paiements
    public function index()
    {
        // Récupère tous les paiements de la base de données
        $payments = Payment::all(); 
        return view('payments.index', ['payments' => $payments]);
    }

    public function create()
    {
        return view('payments.create');
    }

    public function edit($id)
    {
        $payment = Payment::find($id);

        if (!$payment) {
            abort(404);
        }

        return view('payments.edit', ['payment' => $payment]);
    }

    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|integer|exists:reservations,id',
            'car_id' => 'required|integer|exists:cars,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
        ]);

        $payment = Payment::create([
            'rental_id' => $request->rental_id,
            'car_id' => $request->car_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
        ]);

        // Redirige vers la liste des paiements avec un message de succès
        return redirect()->route('payments.index')->with('success', 'Payment created successfully.');
    }

    // Met à jour un paiement existant dans la base de données
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:reservations,id',
            'car_id' => 'required|exists:cars,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        $payment = Payment::find($id);

        if (!$payment) {
            abort(404);
        }

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if (!$payment) {
            abort(404);
        }
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
