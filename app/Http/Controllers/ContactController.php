<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request, Portfolio $portfolio)
    {
        $formfill = $request->validate([
            'email'         => 'required',
            'phone_number'  => 'required',
            'address'       => 'required',
            'birthday'      => 'required',
            'website_url'   => 'required',
        ]);

        $formfill['user_id'] = auth()->user()->id;

        $contact = $portfolio->contacts()->create($formfill);
        return $contact;
    }
}
