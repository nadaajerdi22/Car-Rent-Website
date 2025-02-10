<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        // Récupère les 5 voitures les plus récemment ajoutées en les triant par date de création (ordre décroissant)
        $newCars = Car::orderBy('created_at', 'desc')->take(5)->get();
        // Retourne la vue 'home' et passe les voitures récupérées à la vue en utilisant la fonction 'compact'
        // La vue pourra alors afficher les informations des nouvelles voitures
        return view('home', compact('newCars'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->all();

        // Send email
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->to('your-email@example.com') // Replace with your email
                    ->subject('Contact Us Message from ' . $data['name']);
        });

        return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
    }
}
