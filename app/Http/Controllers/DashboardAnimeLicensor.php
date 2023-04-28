<?php

namespace App\Http\Controllers;

use App\Models\Anime_Licensor;
use App\Http\Requests\Dashboard\AnimeLicensorStoreRequest;
use App\Models\Anime;
use Illuminate\Http\RedirectResponse;

class DashboardAnimeLicensor extends Controller
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
    public function store(AnimeLicensorStoreRequest $request) : RedirectResponse
    {
        Anime_Licensor::where('anime_id', $request->anime_id)->delete();

        if (isset($request->licensor_id)) {
            $licensors = $request->licensor_id;
            foreach ($licensors as $licensor_id) {
                Anime_Licensor::create(['anime_id' => $request->anime_id, 'licensor_id' => $licensor_id]);
            }
            Anime::find($request->anime_id)->touch();
            return back()->with('success', "New Data Anime's Licensor Added");
        }

        return back()->with('warning', "No Any Licensor Selected");
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime_Licensor $anime_Licensor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime_Licensor $anime_Licensor)
    {
        //
    }
}
