<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Notifications\WelcomeUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'apaterno' => ['required', 'string', 'max:255'],
            'amaterno' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'string', 'email', 'max:255', 'unique:t_usuarios'],
            'usuario' => ['required', 'string', 'max:255', 'unique:t_usuarios'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    protected function create(array $data)
    {
        
        $user = Usuario::create([
            'nombre' => $data['nombre'],
            'paterno' => $data['apaterno'],
            'materno' => $data['amaterno'],
            'usuario' => $data['usuario'],
            'correo' => $data['correo'],
            'password' => Hash::make($data['password']),
        ]);
        

        $user->notify(new WelcomeUser($user));

        return $user;
    }
}
