<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\EmailSender;
use App\Models\RecaptchaChecker;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class ClientController extends Controller
{
    //client login UI
    public function clientLogin(Request $request)
    {

        try {

            if(Auth::user() != null){

                return redirect()->route('clients.dashboard');

            }else{

                return view('auth.client_login');
            }

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

    //client register UI
    public function clientRegister(Request $request)
    {

        try {

            if(Auth::user() != null){

                return redirect()->route('clients.dashboard');

            }else{

                return view('auth.client_registration');
            }


        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

    //client login function
    public function login(Request $request)
    {
        $input = $request->all();


        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']))) {
            if (Auth::user()->role_id == 1) {

                return redirect("/admin/dashboard");
            } else {
                return redirect("/");
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Your credentials are incorrect.');
        }
    }

    // ***  Client data store in user table
    public function registerClient(Request $request)
    {
// dd($request->all());
        $request->validate([
            'first_name' => 'required | alpha',
            'last_name' => 'alpha',
            'site_address' => 'required',
            'correspondence_address' => 'required',
            'postal_code' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'contact_number' => 'required',
            'g-recaptcha-response' => 'required'
        ],
        [
            "g-recaptcha-response.required" => "Please mark reCAPTCHA security checks and try again"

        ]);


        try {

            $input = $request->all();

            $recaptchaCheckResponse = RecaptchaChecker::checkRecaptchaVaidity($input['g-recaptcha-response']);

            if(!$recaptchaCheckResponse['success']){

                return back()->with('error','Please mark the recaptcha security checks');
            }

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->site_address = $request->site_address;
            $user->correspondence_address = $request->correspondence_address;
            $user->email = $request->email;
            $user->phone = $request->contact_number;
            $user->username = $request->email;
            $user->postal_code = $request->postal_code;
            $user->role_id = 2;
            $user->status = 1;
            $user->is_approved = User::NOT_APPROVED;
            $user->password = Hash::make($request->password);

            $savedUser = User::create($user->toArray());

            //sending registration email
            EmailSender::sendRegistrationEmail($savedUser->id, $request->password, false);

            Session::put('registerMessage', 'Your account was created successfully and submitted for the approval. You will be notified via the registered email once your registration is approved.');

            return redirect('/');

        } catch (\Exception $exception) {

            return back()->with('error', 'Error occurred - ' . $exception->getMessage());
        }
    }



    // Guest user testimonial add

    public function addTestimonial(Request $request) {

        $request->validate([

            'description'=>'required',
            'g-recaptcha-response' => 'required'
        ]);
        try {
            // This is a guest user front-end add testimonial function. Define guest user as zero.
            $guestUserId = 0;



            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->email = $request->email;
            $testimonial->description = $request->description;
            $testimonial->user_id = $guestUserId;
            $testimonial->status = 1;
            $testimonial->rating = $request->star ;
            $testimonial->is_approved = 0;

            $testimonial->save();

            return back()->with('success', 'Review added successfully.');

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }


    }


}
