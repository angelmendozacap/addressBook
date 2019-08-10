<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContactsRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->contacts;
    }
    
    public function show(Contact $contact)
    {
        return $contact;
    }
    public function store(StoreContactsRequest $request)
    {
        Contact::create($request->all());
    }

    public function update(StoreContactsRequest $request, Contact $contact)
    {
        $contact->update($request->all());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}