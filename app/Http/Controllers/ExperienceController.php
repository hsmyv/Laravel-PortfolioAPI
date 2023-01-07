<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request, Portfolio $portfolio)
    {
        $formfill = $request->validate([
            'title'             => 'required',
            'employment_type'   => 'required',
            'company_name'      => 'required',
            'location_type'     => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',
            'industry'          => 'required',
            'description'       => 'required'
        ]);
        $formfill['user_id'] = auth()->user()->id;
        $experience = $portfolio->experiences()->create($formfill);
        return $experience;
    }
}
