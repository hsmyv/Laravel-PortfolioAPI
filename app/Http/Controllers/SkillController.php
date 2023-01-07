<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request, Portfolio $portfolio)
    {
        $skill = $portfolio->skills()->create([
            'skill' => $request->skill,
            'user_id'   => auth()->user()->id
        ]);
        return $skill;
    }
}
