<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function getUsers(){
        // $adminRole = Role::where('name', 'Administrator');
        $rhUsers = User::select('users.*')->join('model_has_roles as mr', 'mr.model_id', '=', 'users.id')->join('roles as r', 'mr.role_id', '=', 'r.id')->where('r.name', 'RH')->get();
        $trainees = User::select('users.*')->join('model_has_roles as mr', 'mr.model_id', '=', 'users.id')->join('roles as r', 'mr.role_id', '=', 'r.id')->where('r.name', 'Trainee')->get();
        return view('adminView')->with('rhusers', $rhUsers)->with('trainees', $trainees);
    }

    public function addView($role){
        // $userID = Auth::user()->id;
        // $userRole = Role::select('roles.name')->join('model_has_roles as mr', 'mr.role_id', '=', 'roles.id')->join('users as u', 'u.id', '=', 'mr.model_id')->where('u.id', $userID)->first();
        return view('auth.register')->with('roleToBe', $role);
    }

    public function add(Request $r, $role){
        $r->validate([
            'name' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['string', 'nullable', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['string', 'nullable', 'max:255', 'unique:'.User::class],
            'photo' => ['image', 'mimes:jpeg,jpg,png' ,'max:2048'],
            'department' => ['string', 'max:255'],
            'birthdate' => ['date'],
            'job_anniversary' => ['date'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($r->hasFile('photo')){
            $r->file('photo')->storeAs('public/user_photo', $r->name.'.'.$r->file('photo')->getClientOriginalExtension());
            $photoName = $r->name.'.'.$r->file('photo')->getClientOriginalExtension();
        }else
            $photoName = null;

        $user = User::create([
            'name' => $r->name,
            'employee_id' => $r->employee_id,
            'email' => $r->email,
            'phone_number' => $r->phone_number,
            'photo' => $photoName,
            'department' => $r->department,
            'birthdate' => $r->birthdate,
            'job_anniversary' => $r->job_anniversary,
            'password' => Hash::make($r->password),
        ]);

        if($role == 'hr'){
            $rhRole = Role::where('name', 'RH')->first();
            $user -> assignRole($rhRole);
        }else if($role == 'trainee'){
            $traineeRole = Role::where('name', 'Trainee')->first();
            $user -> assignRole($traineeRole);
        }
        // $rhRole = Role::where('name', 'RH')->first();
        // $user -> assignRole($rhRole);

        return redirect ('/admin');
    }
}
