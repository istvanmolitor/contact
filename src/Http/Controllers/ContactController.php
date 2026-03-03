<?php

namespace Molitor\Contact\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact::contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // A feladat nem kéri az adatok mentését vagy küldését, csak a megvalósítást.
        // Itt általában email küldés vagy adatbázisba mentés történne.

        return back()->with('success', 'Köszönjük üzenetét! Hamarosan válaszolunk.');
    }
}
