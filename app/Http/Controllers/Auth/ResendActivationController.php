<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResendActivationRequest;
use App\User;

class ResendActivationController extends Controller
{
    public function index()
    {
        return view('auth.activation.resend');
    }

    public function resendActivation(ResendActivationRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        // resend with event
        event(new UserActivationEmail($user));

        return redirect()->route('login')->withSuccess(
            'Resend success, check your email.'
        );
    }
}
