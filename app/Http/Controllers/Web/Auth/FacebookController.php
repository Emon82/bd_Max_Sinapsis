<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     *
     * This method initiates the authentication process by redirecting the user
     * to Facebook's login page for authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Handle the callback from Facebook after user authentication.
     *
     * This method processes the callback from Facebook. It either logs in an
     * existing user or creates a new user based on the Facebook user information
     * provided, then redirects the user to the layouts.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function facebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            //dd($user);
            $findUser = User::where('facebook_id', $user->id)->first();

            if ($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            }
            else
            {
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'facebook_id' => $user->id,
                    'password' => encrypt('password'),
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
