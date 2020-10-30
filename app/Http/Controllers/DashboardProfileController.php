<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(User $user){
        $user = auth()->user();
        return view('dashboard.profile.show', [
            'user' => $user
        ]);
    }
    public function edit(){
        $user = auth()->user();
        return view('dashboard.profile.edit', compact('user'));
    }
    public function update($id){
        // dd(request()->all());
        $user = User::findOrFail($id);
        $attributes = request()->validate([
            'username' => [
                'string',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore(auth()->user()),
            ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['image'],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore(auth()->user()),
            ],
            'password' => [
                'string',
                'min:8',
                'max:255',
                'confirmed',
            ],
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }
        $user->update($attributes);
        return redirect('/dashboard')->with('msg', 'updated');
    }
}