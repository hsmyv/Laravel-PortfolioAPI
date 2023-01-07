<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class BiographyController extends Controller
{
    public function store(Request $request, Portfolio $portfolio)
    {
        $user = auth()->user();

        if (!Biography::where('user_id', $user->id)->first()) {
            $biography = $portfolio->biographies()->create([
                'biography' => $request->biography,
                'user_id'   => $user->id
            ]);
        } else {
            return response(['message' => 'You have already inserted']);
        }

        return $biography;
    }


    public function update(Request $request)
    {

        $user = auth()->user();
        $biography = Biography::where('user_id', $user->id)->first();

        $formfill = $request->validate([
            'biography' => 'required'
        ]);
        $biography->update($formfill);

        return $biography;
    }
}
