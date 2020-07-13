@component('mail::message')
# Activation Email

Thanks for sign up, please activate your account

@component(
    'mail::button', 
    [
        'url' => route('auth.activate', [
            'email' => $user->email,
            'token' => $user->activation_token
        ])
    ]
)
Activation
@endcomponent

Thanks, {{ $user->name }}<br>
{{ config('app.name') }}
@endcomponent
