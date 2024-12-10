<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.layouts.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Check the role of the authenticated user
        $user = Auth::user();
        if ($user->role !== 'admin') {
            Auth::logout(); // Logout the user if they are not an admin
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect back to the login page with an error message
            return redirect()->route('login')->withErrors([
                'email' => 'Only admins can access the dashboard page.',
            ]);
        }

        // Regenerate session if user is admin
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
