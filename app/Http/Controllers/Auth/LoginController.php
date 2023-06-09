<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }


    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        
        // validation (redirected back and will throw exceptions(error) back accordingly)
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            // no rules for password confirmation field so no exception
        ]);

        // attempt method is how we sign user in
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }
        
        return redirect()->route('dashboard');
    }
}
