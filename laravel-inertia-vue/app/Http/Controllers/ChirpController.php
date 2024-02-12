<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertChirpRequest;
use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return inertia('Home', [
            'chirps' => Chirp::with(['user', 'likers'])->latest()->get()->map(fn (Chirp $chirp) => [
                ...$chirp->toArray(),
                'liked' => $chirp->likers->where('pivot.user_id', $request->user()->id)->count() >= 1
            ])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertChirpRequest $request)
    {
        Chirp::create($request->validated());

        return back()->with('success', 'Chirp has been posted.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
