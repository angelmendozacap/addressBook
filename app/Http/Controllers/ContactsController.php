<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use App\Http\Requests\StoreContactsRequest;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', Contact::class);
        //return $request->user()->contacts;
        return ContactResource::collection($request->user()->contacts);
    }
    
    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);
        return new ContactResource($contact);
    }
    public function store(StoreContactsRequest $request)
    {
        $this->authorize('create', Contact::class);
        request()->user()->contacts()->create($request->all());
    }

    public function update(StoreContactsRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);
        $contact->update($request->all());
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);
        $contact->delete();
    }
}