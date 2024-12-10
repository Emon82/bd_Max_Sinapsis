<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google after user authentication.
     *
     * This method will either log in an existing user or register a new user
     * based on the Google user information provided.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function googleCallback()
    {

        try {
            $user = Socialite::driver('google')->user();
            //dd($user);
            $findGoogleUser = User::where('google_id', $user->id)->first();

            if ($findGoogleUser) {
                Auth::login($findGoogleUser);
                return redirect()->intended('dashboard');
            }
            else
            {
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id' => $user->id,
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
