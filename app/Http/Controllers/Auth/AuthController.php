<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;

use App\User as w_user;
use Auth;
use Mail;
use App\Group;

use Laracasts\Flash\Flash;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Render Registration form 
     * of creating new admins
     */
    public function createadmins(){
        $groups = Group::where('id', '!=', 1)->get();
        return view('backend.registration.register_admins', compact('groups'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function storeadmins(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->group_id = $request->input('group');
        if ($request->input('activation') == "checked"){
            $user->confirmed = 1;
        }
        else{
            $user->confirmed = 2;
        }
        $user->password = bcrypt($request->input('password'));
        $file = $request->file('basic_photo');
        if (!empty($file)){
            $user->basic_photo = $file->getClientOriginalName();
            $file = $file->move('img/users/', $file->getClientOriginalName());
        }
        else{
            $user->basic_photo = "index.png";
        }
        $phone = $request->input('phone');
        $user->phone = $phone;
        $user->confirmation_code = str_random(30);
        $user->save();
        Flash::success('تم اضافة العضو الجديد بنجاح');
        return redirect('admin/admins'); 
    }

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getadmin()
    {
        $user = w_user::where('id', '=', 1)->first();
        return view('auth.admin_login',compact('user'));
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postadmin(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = ($request->input('remember')) ? true : false;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => 1], $remember))
        {
            return redirect('/admin');
        }
        else{
            return redirect('admin/login')->withErrors([
                'email' => 'Wrong E-mail or Password',
            ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function AdminLogout()
    {
        Auth::logout();
        
        return redirect('admin/login')->withErrors([
                'User' => 'Logout Successfully',
        ]);
    }
}

