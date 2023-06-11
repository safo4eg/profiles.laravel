<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        if(Gate::denies('view-profiles')) {
            return redirect()->route('profiles.show', ['profile' => $request->user()->profile->id]);
        }

        $profiles = Profile::all();

        return view('profiles.index', ['profiles' => $profiles]);
    }

    public function show(Request $request, Profile $profile)
    {
        if(Gate::denies('view-profile', $profile)) {
            return redirect()->route('profiles.show', ['profile' => $request->user()->profile->id]);
        }

        return view('profiles.show', [
            'profile' => $profile
        ]);
    }

    public function edit(Request $request, Profile $profile)
    {
        if(Gate::denies('edit-profile', $profile)) {
            return redirect()->route('profiles.edit', ['profile' => $request->user()->profile->id]);
        }

        return view('profiles.edit', ['profile' => $profile]);
    }

    public function update(Request $request, Profile $profile)
    {
        if(Gate::denies('store-profile', $profile)) {
            return redirect()->route('profiles.edit', ['profile' => $request->user()->profile->id]);
        }

        $payload = $request->validate([
            'phone' => ['nullable', 'string', 'max:11'],
            'about' => ['nullable', 'string', 'max:500'],
            'hobby' => ['nullable', 'string', 'max:255'],
            'favorite_band' => ['nullable', 'string', 'max:128'],
            'comment' => ['nullable', 'string', 'max:255']
        ]);

        $profile->fill($payload);
        $profile->save();

        return redirect()->route('profiles.show', ['profile' => $profile->id]);
    }
}
