<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // Import User model
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the sign-in form
    public function showSignInForm()
    {
        return view('auth.sign-in');
    }

    // Handle user registration (Sign Up)
    public function signIn(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user record
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password before saving
        ]);

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'User created successfully!');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle user login
    public function login(Request $request)
    {
        // Attempt to authenticate the user with email and password
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // If authentication is successful, redirect to the home page
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // If authentication fails, return with an error message
        return redirect()->back()->withErrors('Invalid login details.');
    }
}
