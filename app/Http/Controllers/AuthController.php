<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Village;
use App\Models\VillageUser;

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
                    return redirect()->route('admin.index');
                    break;

                case 'Admin Kampung':
                    return redirect()->route('kampung.index');
                    break;

                case 'Operator':
                    break;

                case 'User':
                    return redirect()->route('masyarakat.index');
                    break;
            }
        }

        return back()->with("danger", "Fail to Login check your Email & Password!");
    }

    // Registration
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
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $user = User::create([
            'name' => ucwords($validate['name']),
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'address' => $validate['address'],
            'role' => "Admin Kampung",
            'status' => "Granted"
        ]);
        
        $village = Village::create([
            'name' => ucwords($validate['namaKampung']),
            'latitude' => $validate['latitude'],
            'longitude' => $validate['longitude'],
            'address' => $validate['address'],
            'status' => 'Waiting',
            'admin_id' => $user->id
        ]);

        if($user AND $village) {
            return redirect()->route('auth.login')->with("success", "Account created. Please Login!");
        }
    }

    // User Registration
    public function selectKampung(Request $request) {

        if($request->has('search')) {
            $village = Village::where('status', '=', 'Granted')->where('name', 'LIKE', '%'.$request['search'].'%')->orWhere('address', 'LIKE', '%'.$request['search'].'%')->paginate(10);
        } else {
            $village = Village::where('status', '=', 'Granted')->paginate(10);
        }

        return view('auth.user.kampung', [
            'title' => 'Pilih Kampung',
            'villages' => $village
        ]);
    }

    public function regisUser(Village $village) {
        return view("auth.user.user", [
            'title' => "Register User",
            'village' => $village
        ]);
    }

    public function regisUserProcess(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required'
        ]);

        $user = User::create([
            'name' => ucwords($validate['name']),
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'address' => $validate['address'],
            'role' => 'User',
            'status' => 'Waiting'
        ]);

        $villageUser = VillageUser::create([
            'village_id' => $request['village_id'],
            'user_id' => $user->id
        ]);

        if($user AND $villageUser) {
            return redirect()->route('auth.login')->with("success", "Account created. Please login!");
        }
    }

    // Operator Registration
    public function regisOperator() {
        return view("auth.regisOperator", [
            'title' => "Register Operator"
        ]);
    }

    public function regisOperatorProcess(Request $request) {
        $validate = $request->validate([
            'name' => 'required|min:1|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'address' => 'required',
            'type' => 'required'
        ]);

        $user = User::create([
            'name' => ucwords($validate['name']),
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'address' => $validate['address'],
            'role' => 'Operator',
            'status' => 'Waiting',
            'type' => $validate['type']
        ]);

        if($user) {
            return redirect()->route("auth.login")->with("success", "Account created. Please login!");
        }
    }

    // Logout
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
