<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::query()->find(auth()->user()->id);
        $user->update($request->all());

        return redirect()->route('backend.dashboard')->with('success', 'Your profile has been updated.');
    }

    public function passwordChange()
    {
        return view('admin.profile.password');
    }

    public function passwordUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = User::query()->find(auth()->user()->id);
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'current_password' => ['required'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required']
        ])->after(function ($validator) use ($user, $request) {
            if (!Hash::check($request['current_password'], $user->password)) {
                $validator->errors()->add('current_password', 'Your current password is wrong!!!');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('backend.password.change')->withErrors($validator);
        }

        $user->forceFill(['password' => bcrypt($request['password'])])->save();
        //auth()->login($user);

        return redirect()->route('backend.dashboard')->with('success', 'Your password has been changed.');
    }
}
