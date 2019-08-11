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
    
    public function show(Request $request, Contact $contact)
    {
        if ($request->user()->isNot($contact->user)) {
            return response([], 403);
        }
        return $contact;
    }
    public function store(StoreContactsRequest $request)
    {
        request()->user()->contacts()->create($request->all());
    }

    public function update(StoreContactsRequest $request, Contact $contact)
    {
        if (request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        $contact->update($request->all());
    }

    public function destroy(Contact $contact)
    {
        if (request()->user()->isNot($contact->user)) {
            return response([], 403);
        }
        $contact->delete();
    }
}