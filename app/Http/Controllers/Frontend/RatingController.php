<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use App\User;
use Ghanem\Rating\Models\Rating;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class RatingController extends Controller
{
    public function index()
    {
        
    }

    public function store(Request $request, $id)
    {
        $speaker = Speaker::findorFail($id);
        $user = User::findorFail(CurrentUser()->id);

        if(Rating::where('author_id', CurrentUser()->id)->where('ratingable_id', $speaker->id)->first()){
            Flash::message('You have already rated this speaker.');
        }else {
            $speaker->rating($request->only('rating'), $user);
            Flash::message('Thank you for rating '. Speaker::findorFail($id)->full_name);
        };

        return redirect()->back();
    }
}
