<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class LikeChirpController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Chirp $chirp, Request $request)
    {
        if ($request->boolean('add')) {
            $chirp->likers()->attach($request->user()->id);
        } else {
            $chirp->likers()->detach($request->user()->id);
        }

        return back();
    }
}
