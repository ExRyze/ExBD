<?php

namespace App\Http\Controllers;

use App\Http\Requests\Setting\SettingUserProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class HomeSetting extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile() : View
    {
        return view('home.setting.profile', [
            'page' => $this->getUrl(URL::current()),
            'user' => User::where('username', auth()->user()->username)->first()
        ]);
    }

    public function updateProfile(SettingUserProfileRequest $request, User $user, String $id) : RedirectResponse
    {
        if ($request->file('file') != null) {
            $request->file('file')->storeAs('public/images/users/'.$request->username.'.jpg');
        }

        $user->where('id', $id)->update($request->validated());

        return back()->with('success', 'Data User Updated Successfully');
    }
}
