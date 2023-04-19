<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Dashboard\UserStoreRequest;
use App\Http\Requests\Dashboard\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class DashboardUser extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:Admin']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('dashboard.user.index', [
            'page' => $this->getUrl(URL::current()),
            'table' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('dashboard.user.create', [
            'page' => $this->getUrl(URL::current()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request) : RedirectResponse
    {
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
            return view('dashboard.user.edit', [
                'page' => $this->getUrl(URL::current()),
                'user' => $user->where('username', $username)->first()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user, String $id) : RedirectResponse
    {
        $user->where('id', $id)->update($request->validated());

        return redirect('/dashboard/user')->with('success', 'Data User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(User $user, String $username) : RedirectResponse
    {
        $user->where('username', $username)->delete();

        return redirect('/dashboard/user')->with('success', 'Data User Deleted Successfully');
    }
}
