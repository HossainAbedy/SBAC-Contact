<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'empid' => ['required'],
            'branch_code' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    
        if ($request->hasFile('img')) {
            $rules['img'] = ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'];
        }
    
        $request->validate($rules);
    
        $input = $request->all();
    
        if ($thumbnail = $request->file('img')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $profileImage);
            $input['img'] = $profileImage;
        } else {
            $input['img'] = 'images/default.jpg'; // Set default image path
        }
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'empid' => $request->empid,
            'branch_code' => $request->branch_code,
            'img' => $input['img'],
            'password' => Hash::make($request->password),
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        return redirect(RouteServiceProvider::HOME);
    }
}
