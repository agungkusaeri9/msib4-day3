<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class Tugas9Controller extends Controller
{
    public function index()
    {
        return view('pages.tugas9.index',[
            'title' => 'Authentikasi dengan Google'
        ]);
    }

    public function google_view()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            // cek user
            $findUser = User::where('google_id',$user->getId())->first();
            if($findUser)
            {
                Auth::login($findUser);
            }else{
                $newUser = User::create([
                    'name' => $user->getName(),
                    'username' => \Str::snake($user->getName()),
                    'google_id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'password' => bcrypt($user->getEmail() . $user->getId())
                ]);

                $newUser->assignRole('Super Admin');

                Auth::login($newUser);
            }
            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            // throw $th;
            return redirect()->route('login')->with('error','Login Gagal!');
        }
    }
}
