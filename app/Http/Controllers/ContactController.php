<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Message save karo
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        $contact = Contact::create($request->all());

        return response()->json([
            'message' => 'Message save ho gaya! ✅',
            'data'    => $contact
        ]);
    }

    // Saare messages
    public function index()
    {
        return response()->json(Contact::latest()->get());
    }
}