<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
            return redirect()->intended('/admin/santri');
        }

        return redirect()->intended('/santri');
    }
}
