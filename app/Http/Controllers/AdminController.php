<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education as RequestsEducation;
use Illuminate\Http\Request;
use App\Models\Biography;
use App\Models\Education;

class AdminController extends Controller
{
    public function update_biography(Request $request, $id)
    {

        $biography = Biography::where('user_id', $id)->first();

        $formfill = $request->validate([
            'biography' => 'required'
        ]);
        $biography->update($formfill);

        return $biography;
    }

    public function update_education(RequestsEducation $request, $id)
    {
        $education = Education::where('user_id', $id)->first();

        $education->update($request->validated());
        return $education;
    }
}
