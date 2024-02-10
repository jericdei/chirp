<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpsertChirpRequest;
use App\Models\Chirp;
use App\Models\User;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('Home', [
            'chirps' => Chirp::with(['user'])->latest()->limit(1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertChirpRequest $request)
    {
        //
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
