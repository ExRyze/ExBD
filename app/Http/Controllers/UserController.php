<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Brick\Math\BigInteger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('staff.user.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('staff.user.create', [
            'page' => $this->getUrl(URL::current()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) : RedirectResponse
    {
        // Store Data
        User::create($request->validated());

        return redirect('/dashboard/user')->with('success', 'New Data User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user, String $id) : RedirectResponse
    {
        // Delete
        $user->where('id', $id)->delete();

        return redirect('/dashboard/user')->with('success', 'Data User Deleted Successfully');
    }
}
