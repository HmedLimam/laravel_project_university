<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactRequest $request)
    {
        // $contact = new Contact();
        // $contact->nom = $request->nom;
        // $contact->email = $request->email;
        // $contact->message = $request->message;
        // $contact->save();

        Contact::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return view('confirm', ["nom" => $request->input('nom')]);
    }
}