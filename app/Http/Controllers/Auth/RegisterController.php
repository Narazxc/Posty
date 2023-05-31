<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        // validation (redirected back and will throw exceptions(error) back accordingly)
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            // no rules for password confirmation field so no exception
        ]);

        // store the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // sign the user in
        // two ways to sign user in: facades or auth helper either one fine
        // using auth helper
        //auth()->user(); // return the current authenticated user obj/model else null


        // attempt method is how we sign user in
        auth()->attempt($request->only('email', 'password'));

        
        // redirect
        return redirect()->route('dashboard');
    }
}
