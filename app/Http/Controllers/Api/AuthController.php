<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function register(Request $request)
    {
        if($request->isMethod('get')) {
            return view('auth.register');
        }

        if($request->isMethod('post')) {
            $attributes = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'unique:'.User::class, 'max:255'],
                'password' => ['required', 'string', 'max:255', 'confirmed'],
            ]);

            $user = User::create(array_merge($attributes, ['password' => Hash::make($attributes['password'])]));
            $profile = Profile::create(['user_id' => $user->id]);
            Auth::login($user);
            return redirect()->route('profiles.show', ['profile' => $profile->id]);
        }
    }

    public function login(Request $request)
    {
        if($request->isMethod('get')) {
            return view('auth.login');
        }

        if($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => ['required', 'string'],
                'password' => ['required', 'string']
            ]);

            $user = User::where('email', $credentials['email'])->first();

            if(!$user || !Hash::check($credentials['password'], $user->password)) {
                return redirect()->back()
                    ->withInput(['email' => $credentials['email']])
                    ->withErrors(['email' => 'Passed credentials are incorrect']);
            }

            Auth::attempt($credentials);
            return redirect()->route('profiles.show', ['profile' => $user->profile->id]);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        Auth::logout($user);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
}
