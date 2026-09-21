<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $data = $request->validated();

        if ($request->hasFile('image')) {

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $data['image'] = $request->file('image')->store('avatars', 'public');
        }

        $user->fill($data);
        $user->save();

        return redirect()->route('profile.edit')
            ->with('status', 'profile-updated');
    }
}
