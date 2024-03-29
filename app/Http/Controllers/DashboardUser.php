<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Dashboard\User\UserStoreRequest;
use App\Http\Requests\Dashboard\User\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class DashboardUser extends Controller
{

    public $data = [
        'roles' => ['Admin', 'Staff', 'User']
    ];

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
            'data' => $this->data
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
            return redirect('/dashboard/user')->with('warning', "Error 404: User '{$username}' not found!");
        } else {
            return view('dashboard.user.edit', [
                'page' => $this->getUrl(URL::current()),
                'user' => $user->where('username', $username)->first(),
                'data' => $this->data
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request) : RedirectResponse
    {
        User::where('id', $request->id)->update($request->validated());

        return redirect('/dashboard/user')->with('success', 'Data User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request) : RedirectResponse
    {
        User::where('id', $request->id)->delete();

        return redirect('/dashboard/user')->with('success', 'Data User Deleted Successfully');
    }
}
