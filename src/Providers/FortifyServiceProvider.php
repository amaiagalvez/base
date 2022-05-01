<?php

namespace Amaia\Base\Providers;

use Amaia\Base\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Amaia\Base\Actions\Fortify\CreateNewUser;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Amaia\Base\Actions\Fortify\ResetUserPassword;
use Amaia\Base\Actions\Fortify\UpdateUserPassword;
use Amaia\Base\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // To take base package views
        if (!empty(config('fortify.alternative-fortify-views'))) {
            foreach (config('fortify.alternative-fortify-views') as $method => $view) {
                Fortify::$method(fn () => view($view));
            }
        }

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        // To change login email or username

        Fortify::authenticateUsing(function (LoginRequest $request) {
            $user = User::where('email', $request->email)
                ->orWhere('username', $request->email)->first();

            if (
                $user &&
                Hash::check($request->password, $user->password)
            ) {
                return $user;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
