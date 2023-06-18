<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;

class PortfolioController extends Controller
{
    public function index()
    {
        return Portfolio::with('media')->get();
    }


    public function destroy($id)
    {
        Portfolio::destroy($id);
        return response(['message' => "Portfolio has been deleted successfully"]);
    }
    public function create(Request $request, Portfolio $portfolio)
    {

        $formfill['user_id'] = auth()->user()->id;
        $portfolio = Portfolio::create($formfill);


        if ($images = $request->file('other_image')) {
            foreach ($images as $image) {
                $portfolio->addMedia($image)
                    ->toMediaCollection('portfolio_other_image');
            }

        }
        //return $portfolio;
        return response(['message' => 'Portfolio created successfully'], 200);

    }

    public function update(Request $request)
    {

        $user = auth()->user();
        $portfolio = Portfolio::where('user_id', $user->id)->first();
        $formfill['user_id'] = $user->id;
        $portfolio->update($formfill);

        if ($request->hasFile('image')) {
            $portfolio->addMediaFromRequest('image')
                ->usingName('portfolioImage')
                ->toMediaCollection('portfolioImage');
        }else{
            return response(["message" => 'Not have file image!']);
        }
        return $portfolio; //response(['message' => 'Updated successfully']);*/

    }
}
