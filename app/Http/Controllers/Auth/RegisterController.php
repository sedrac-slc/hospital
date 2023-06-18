<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    public function validator(array $data)
    {
        $array = ['required', 'string', 'min:8'];

        if($data['password'] != $data['confirm_password'])
            $array = ['required', 'string', 'min:8','confirmed'];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required'],
            'phone' => ['required'],
            'gender' => ['required','regex:/[MASCULINO|FEMENINO]/u'],
            'naturalness' => ['required'],
            'nationality' => ['required'],
            'password' => $array
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birthday'=> $data['birthday'],
            'phone' => $data['phone'],
            'naturalness' => $data['naturalness'],
            'nationality' => $data['nationality']
        ]);

        $user->update([
            'created_by' => $user->id,
            'updated_by' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return $user;
    }

}
