<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Village;

class AuthController extends Controller
{
    // Login
    public function login()
    {
        return view("auth.login", [
            "title" => "Login",
        ]);
    }

    public function loginProcess(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            $role = Auth()->user()->role;

            switch ($role) {
                case 'Admin':
                    # code...
                    break;

                case 'Admin Kampung':
                    break;

                case 'Operator':
                    break;

                case 'User':
                    break;
            }
        }

        return back()->with("danger", "Fail to Login check your Email & Password!");
    }

    // Regsitration
    public function register()
    {
        return view("auth.register", [
            "title" => "Register"
        ]);
    }

    // Kampung
    public function regisKampung()
    {
        return view("auth.kampung.user", [
            'title' => "Registrasi Admin Kampung"
        ]);
    }

    public function regisKampungProcess(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:4|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'namaKampung' => 'required|min:5',
            'address' => 'required'
        ]);

        $user = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'address' => $validate['address'],
            'role' => "Admin Kampung",
            'status' => "Waiting"
        ]);

        $village = Village::create([
            'name' => $validate['namaKampung'],
            'address' => $validate['address'],
            'admin_id' => $user->id
        ]);

        if($user AND $village) {
            return redirect()->route('auth.login')->with("success", "Account created. Please Login!");
        }
    }
}
