<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if (!auth()->user()->is_reader) {
            return redirect()->route('backend.dashboard');
        }
        else {
            return redirect()->route('home');
        }
    }
}
