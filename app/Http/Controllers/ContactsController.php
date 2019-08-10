<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\StoreContactsRequest;

class ContactsController extends Controller
{
    public function show(Contact $contact)
    {
        return $contact;
    }
    public function store(StoreContactsRequest $request)
    {
        Contact::create($request->all());
    }
}