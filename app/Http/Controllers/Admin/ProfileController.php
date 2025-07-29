<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

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
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            // 'user' => $request->user(),
            'admin' => Auth::guard('admin')->user(),
        ]);
    }

   

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();

        $admin->fill($request->validated());

        if ($admin->isDirty('email')) {
            $admin->email_verified_at = null;
        }

        $admin->save();

        return redirect()->back()->with('status', 'profile-updated');
    }

   

    public function destroy(Request $request): RedirectResponse
    {
        // Validate the password
        $request->validateWithBag('adminDeletion', [
            'password' => ['required', 'current_password:admin'], // use guard name in current_password
        ]);

        $admin = Auth::guard('admin')->user();

        Auth::guard('admin')->logout();

        // Clear session
        session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $admin->delete();

        return Redirect::route('admin.login'); // Make sure this route is defined
    }


    
}
