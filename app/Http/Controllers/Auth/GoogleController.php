<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Get the user info from Google
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Check if the user already exists
            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                // Create a new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(), // Save Google ID for reference
                    'password' => bcrypt(str()->random(16)), // Random password (optional, not used)
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Redirect to the desired page
            return redirect()->route('home')->with('success', 'You are logged in!');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('Failed to log in with Google.');
        }
    }
}
