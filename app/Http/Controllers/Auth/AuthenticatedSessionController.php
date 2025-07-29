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
  
    public function create(): View
    {
        return view('auth.login'); 
    }

    
    public function store(LoginRequest $request): RedirectResponse
    {
       
        if (!Auth::guard('admin')->attempt(
            $request->only('name', 'password'),
            $request->boolean('remember')
        )) {
            return back()->withErrors([
                'name' => 'Invalid credentials',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin-dashboard'));
    }

 
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login'); 
    }
}
