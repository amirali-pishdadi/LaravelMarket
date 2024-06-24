<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("User.register");
    }

    /**
     * Show the form for Login.
     */
    /**
     * Show Login form.
     */
    public function login(Request $request)
    {
        // Return the view for user login
        return view("User.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name"     => "required|string|min:3",
            "email"    => "required|email|min:3",
            "password" => "required|string|min:8",
            "confirm"  => "required|string|min:8",
        ]);

        if ($formFields["password"] == $formFields["confirm"]) {
            User::create([
                "name"     => $formFields["name"],
                "email"    => $formFields["email"],
                "password" => Hash::make($formFields["password"]),
                "is_admin" => false,
            ]);

            return redirect("/login");
        } else {
            return back()->with("message", "Password and confirm password should be equal");
        }
    }


    /**
     * Validate Login form and Log user into website.
     */
    public function authenthicate(Request $request)
    {
        // Validate login form fields from the request
        $formFields = $request->validate([
            'email'    => 'email|required|min:3',
            'password' => 'string|required|min:8',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($formFields)) {
            $user = User::where('email', $formFields["email"])->first();
            auth()->login($user);
            return redirect("/");
        } else {
            // Redirect the user to the registration page if authentication fails
            return redirect('/register');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
