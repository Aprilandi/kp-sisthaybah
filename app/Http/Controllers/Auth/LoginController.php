<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function masuk(Request $request){
    //     $data1 = Santri::where('email','=', $request->email)->where('password','=',$request->password)->get();
    //     $data2 = User::where('email','=', $request->email)->where('password','=',$request->password)->get();

    //     if(count($data1)>0){
    //         Auth::guard('santri')->LoginUsingId($data1[0]['id_santri']);
    //     }elseif(count($data2)>0){
    //         Auth::guard('user')->LoginUsingId($data1[0]['id']);
    //     }else{
    //         return redirect('auth/login')->with(['']);
    //     }
    // }

    protected function authenticated($request, $user)
    {
        if($user->id_role == 1) {
            return redirect()->intended('/admin');
        }

        return redirect()->intended('/santri');
    }



    public function login(Request $request){
        $data = User::where('username','=',$request->username)->first();
        if($data){
            if(Hash::check($request->password,$data->password)){
                Auth::login($data);
                // dd($data);
                return redirect('admin');
    
            }
            return redirect()->back()->withErrors('password', 'The Message');
        }
        return redirect()->back()->withErrors('username', 'The Message');

        
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('login');
      }
      
}
