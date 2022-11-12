<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Lunaweb\RecaptchaV3\RecaptchaV3;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{

    public function store(Request $request)
    {
        $request->validate(
            [
                Fortify::username() => 'required|string',
                'password' => 'required|string',
                'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
            ],
            [
                Fortify::username().'.required' => 'The email is required!',
                'password.required' => 'The password is required!',
                'g-recaptcha-response.required' => 'Recaptcha invalid !'
            ]
        );

         return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });


    }

    protected function loginPipeline(Request $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

}
