<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{

    public function index()
    {
        //
    }

    public function store(StoreContactRequest $request)
    {
        $first_name  = $request->first_name;
        $last_name   = $request->last_name;
        $email       = $request->email;
        $message     = $request->message;

        $contacts = Contact::create([
            'first_name'  => $first_name,
            'last_name'   => $last_name,
            'email'       => $email,
            'message'     => $message,
        ]);

        return redirect()->route('home');
    }

    public function store_contact_api(StoreContactRequest $request)
    {
        $first_name  = $request->first_name;
        $last_name   = $request->last_name;
        $email       = $request->email;
        $message     = $request->message;

        $contacts = Contact::create([
            'first_name'  => $first_name,
            'last_name'   => $last_name,
            'email'       => $email,
            'message'     => $message,
        ]);

        return response()->json(['message' => 'the ask is send success'] , 200);
    }


    public function destroy(Contact $contact)
    {
        //
    }
}
