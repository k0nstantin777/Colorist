<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
    
    public function username()
    {
        return 'name';
    }
    
    /**
     * Страница входа
     * @return string
     */
    public function login()
    {
        return view('auth.login');
    }
    
    /**
     * Обработка формы входа
     * @param Request $request
     * @return string
     */
    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;
        
        $authResult = Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ], $remember);
                           
        if (!$authResult){
            return redirect()
               ->route('login')
               ->with('authError', 'Неверный логин или пароль');  
        } 
               
        return redirect()->intended(route('admin.home'));
    }
    
        
    /**
     * Выход юзера с сайта
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('login');
           
    }
}
