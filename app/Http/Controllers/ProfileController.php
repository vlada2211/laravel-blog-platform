<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }
    public function show(\App\Models\User $user)
    {
        $posts = $user->posts()->latest()->get();

        return view('profile.show', compact('user', 'posts'));
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $path = $request->file('image')->store('avatars', 'public');

            $data['image'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
