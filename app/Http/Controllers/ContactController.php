<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;


class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Enregistrer le message de contact dans la base de données
        Contact::create([
           'name' => $request->name,
           'email' => $request->email,
           'message' => $request->message,
    ]);
        // Envoyer l'e-mail (si nécessaire)
        return redirect()->route('home')->with('success', 'Your message has been sent successfully!');
    }
}
