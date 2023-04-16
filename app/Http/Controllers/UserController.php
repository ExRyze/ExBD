<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, String $username)
    {
        if ($user->where('username', $username)->count() === 0) {
            return redirect('/dashboard/user');
        } else {
            return view('staff.user.edit', [
                'page' => $this->getUrl(URL::current()),
                'data' => $user->where('username', $username)->first()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id) : RedirectResponse
    {
        // Update Data
        User::where('id', $id)->update($request->validate(['role' => 'required']));

        return redirect('/dashboard/user')->with('success', 'Data User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user, String $username) : RedirectResponse
    {
        // Delete Data
        $user->where('username', $username)->delete();

        return redirect('/dashboard/user')->with('success', 'Data User Deleted Successfully');
    }
}
