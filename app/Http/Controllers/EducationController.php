<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education as RequestsEducation;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Education;

class EducationController extends Controller
{
    public function store(Request $request, Portfolio $portfolio)
    {
        try {
            $user = auth()->user();

            if (!Education::where('user_id', $user->id)->first()) {
                $formfill = $request->validate([
                    'school'                        => 'required',
                    'degree'                        => 'required',
                    'fieldofstudy'                  => 'required',
                    'start_date'                    => 'required',
                    'end_date'                      => 'required',
                    'grade'                         => 'required',
                    'activities_and_socities'       => 'required',
                    'description'                   => 'required',
                ]);

                $formfill['user_id'] = Auth()->user()->id;
                $education = $portfolio->educations()->create($formfill);
            } else {
                return response(['message' => 'You have already inserted!']);
            }
        } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $th) {
            throw $th; //response(["message" => 'Not found any portfolio!']);
        }
        return $education;
    }

    public function update(RequestsEducation $request)
    {
        $user = auth()->user();
        $education = Education::where('user_id', $user->id)->first();

        $education->update($request->validated());
        return $education;
    }
}
