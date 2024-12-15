<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListingController;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // Show the login form and index page
    public function index()
    {
        $listings = Listing::all();
        return view('listings.admin', compact('listings'));
    }

    // Handle login request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Authenticate the user
        $user = User::where('email', $credentials['email'])
                    ->where('password', $credentials['password'])
                    ->first();

        if ($user) {
            $request->session()->regenerate();

            // Redirect based on user type
            if ($user->role_type == 'a') {
                return redirect()->route('admin.dashboard'); // Admin dashboard
            } elseif ($user->role_type == 'u') {
                return redirect()->route('user.dashboard'); // User dashboard
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Admin Dashboard
    public function adminDashboard()
    {
        $listings = Listing::all();
        return view('listings.admin.dashboard', compact('listings'));
    }

    // User Dashboard
    public function userDashboard()
    {
        return view('listings.user.dashboard');
    }

    // Listing CRUD methods (for admin)
    public function showLoginForm()
    {
        return view('listings.index');
    }
    
    public function indexListings()
    {
        $listings = Listing::all();
        return view('listings.index', compact('listings'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longtitude' => 'required|numeric|between:-180,180',
        ]);

        Listing::create($request->all());

        return redirect()->route('listings.index')->with('success', 'Listing created successfully.');
    }

    public function edit($id)
    {
        $listing = Listing::findOrFail($id);
        return view('listings.edit', compact('listing'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longtitude' => 'required|numeric|between:-180,180',
        ]);

        $listing = Listing::findOrFail($id);
        $listing->update($request->all());

        return redirect()->route('listings.index')->with('success', 'Listing updated successfully.');
    }

    public function destroy($id)
    {
        $listing = Listing::findOrFail($id);
        $listing->delete();

        return redirect()->route('listings.index')->with('success', 'Listing deleted successfully.');
    }

}

