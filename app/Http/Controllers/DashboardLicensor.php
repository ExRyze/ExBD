<?php

namespace App\Http\Controllers;

use App\Models\Licensor;
use App\Http\Requests\Dashboard\Component\LicensorStoreRequest;
use App\Models\Anime;
use App\Models\Anime_Licensor;
use Illuminate\Http\RedirectResponse;

class DashboardLicensor extends Controller
{
    public function __construct()
    {
        // Allow :: Admin && Staff
        $this->middleware(['auth', 'role:Admin|Staff']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LicensorStoreRequest $request) : RedirectResponse
    {
        Licensor::create($request->validated());

        if (isset($request->anime_id)) {
            Anime_Licensor::create(['anime_id' => $request->anime_id, 'licensor_id' => Licensor::where('licensor', $request->licensor)->first()->id]);
            Anime::find($request->anime_id)->touch();
        }

        return back()->with('success', 'New Data Licensor Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Licensor $licensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licensor $licensor)
    {
        //
    }
}
