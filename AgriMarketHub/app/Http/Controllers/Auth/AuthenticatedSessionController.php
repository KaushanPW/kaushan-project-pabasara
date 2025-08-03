<?php

namespace App\Http\Controllers\Auth;

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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

public function store(Request $request): RedirectResponse
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        // Check if the user is admin
        if (Auth::user()->is_admin) {
            return redirect()->intended('/admin/dashboard');
        }

        // Non-admin users go to home
        return redirect()->intended('/home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    /**
     * Destroy an authenticated session.
     */
   /**
 * Destroy an authenticated session.
 */
public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Redirect to login page after logout
}

}
