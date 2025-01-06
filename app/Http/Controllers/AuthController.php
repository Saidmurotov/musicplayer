<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function guest() # mehmonlar uchun asosiy sahifa
    {
        if (Auth::check()) { # agar mijoz autentifikatsiyadan otgan bolsa
            if (auth()->user()->hasRole('admin')) { # admin bolsa admmin asosiy sahofasiga
                return redirect()->route('admin.home')->with('success', 'Welcome to Admin Dashboard!');
            } elseif (auth()->user()->hasRole('user')) { # user bolsa userning asosiy sahifasiga
                return redirect()->route('user.home')->with('success', 'Welcome to User Dashboard!');
            }
        } else { #agar royxatdan otmagan bolsa
            return view('guest/home'); # mehmonlarni asosiy sahifasiga
        }
    }
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request) # kirish so'rovlariga javob beradi
    {
        $request->validate([ # tekshirish
            'email' => 'required|email', # email kiritlganligini tekshirish
            'password' => 'required', # parol kiritilganligini tekshirish
        ]);

        if (Auth::attempt($request->only('email', 'password'))) { # autentifikatsiyadan otiradi
            $request->session()->regenerate();

            // Redirect based on user role
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.home')->with('success', 'Welcome to Admin Dashboard!');
            } elseif (auth()->user()->hasRole('user')) {
                return redirect()->route('home')->with('success', 'Welcome to User Dashboard!');
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = \App\Models\User::create([ # user yaratish jarayoni
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole('user'); // yangi foydalanuvchiga rol biriktirish

        return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
    }

    // Handle logout
    public function logout(Request $request) # chiqish funksiyasi
    {
        Auth::logout(); # chiqish
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out.');
    }
}
