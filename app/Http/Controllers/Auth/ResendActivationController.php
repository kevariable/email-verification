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

        // send email if user active yet
        if (event(new UserActivationEmail($user))) {
            return redirect()->route('login')->withSuccess(
                'Your activation has sended, check your email.'
            );
        }

        // prevent send email if user already active
        return redirect()->route('login')->withFailed(
            'The selected email already activation, please login'
        );
    }
}
