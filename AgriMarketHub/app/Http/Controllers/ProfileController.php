<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'current_password' => 'required_with:new_password|current_password',
            'new_password' => ['nullable', Password::defaults()],
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
        
        $user->save();
        
        return back()->with('success', 'Profile updated successfully!');
    }
    
   public function destroy(Request $request)
{
    $request->validate([
        'password' => ['required', 'current_password'],
    ]);

    try {
        $user = $request->user();
        
        // Logout before deletion
        Auth::logout();
        
        // Delete the user
        if (!$user->delete()) {
            throw new \Exception('Failed to delete user record');
        }
        
        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'Your account has been deleted.');
        
    } catch (\Exception $e) {
        \Log::error('Account deletion failed: '.$e->getMessage());
        return back()->with('error', 'Account deletion failed. Please try again.');
    }
}
}