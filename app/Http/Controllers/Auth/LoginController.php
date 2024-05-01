<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RecaptchaChecker;
use Auth;

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

    public function login(Request $request)
    {
        $input = $request->all();


        $this->validate($request, [
                'email' => 'required',
                'password' => 'required',
                // 'g-recaptcha-response' => 'required'
            ],
            // [
            //     "g-recaptcha-response.required" => "Please mark reCAPTCHA security checks and try again"
                
            // ]
        );

        // $recaptchaCheckResponse = RecaptchaChecker::checkRecaptchaVaidity($input['g-recaptcha-response']);

        // if(!$recaptchaCheckResponse['success']){           

        //     $routeUrl = explode('/',url()->previous());

        //     if(end($routeUrl) == 'client-login'){

        //         return redirect()->route('clients.login')
        //         ->with('error','Please mark the recaptcha security checks');

        //     }else{

        //         return redirect()->route('login')
        //         ->with('error','Please mark the recaptcha security checks');
        //     }
        // }

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            

            if(Auth::user()->is_approved == User::APPROVED){
                //Account is approved

                if(Auth::user()->status == User::ACTIVE){
                    //Account is active

                    if(Auth::user()->role_id == 1){

                        return redirect()->route('home');

                    }else{

                        return redirect()->route('clients.dashboard');
                    }

                }else{
                    //Account not active
                    Auth::logout();
                    return back()->with('error','Sorry, your account has been disabled. Please contact Administrator.');
                }

            }else{

                //Account not approved
                Auth::logout();
                return back()->with('error','Your account approval process not completed yet. We will notify once the account approved.');
            }
            


        }else{
            
            $routeUrl = explode('/',url()->previous());

            if(end($routeUrl) == 'client-login'){

                return redirect()->route('clients.login')
                ->with('error','Your credentials are incorrect.');

            }else{

                return redirect()->route('login')
                ->with('error','Your credentials are incorrect.');
            }
            
        }

    }
    protected function authenticated($request, $user)
    {

        if(Auth::user()->role_id == 1){

            return redirect()->route('home');

        }else{
            return redirect()->route('clients.dashboard');
        }

    }
}
