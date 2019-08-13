<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Contact as ContactResource;
class SearchController extends Controller
{
    public function index(Require $request)
    {
        $data = $request->validate([
            'searchTerm' => 'required',
        ]);
        $contacts = Contact::search($data['searchTerm'])->get();
        return ContactResource::collection($contacts);
    }
}
