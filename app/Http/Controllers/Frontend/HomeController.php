<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Project;
use App\Models\Sponsor;
use App\Models\Testimonial;
use App\Models\UserSubscription;

class HomeController extends Controller
{
    public function index(Request $request){

        try{

            $metaContent = array(
                "page_title" => "RDK Civil Engineering Limited - Your One Stop Service Provider For All Planning, Architectural And Structural Needs",
                "meta_tag_description" => "RDK Civil Engineering Limited, led by a team of chartered civil engineers, was established with the goal of becoming the most dependable and trustworthy engineering consultancy in the UK. Our team takes a fresh approach to each client, creating tailored and innovative solutions to meet their unique needs.",
                "meta_keywords" => "RDK Civil Engineering Limited",
                "canonical_url" => route('web.home')
            );

            $projects = Project::where('status',1)->where('is_featured',1)->orderBy('created_at','desc')->limit(6)->get();

            $testimonials = Testimonial::with('user')->where('is_approved', 1)->where('status', 1)->orderBy('created_at', 'DESC')->get();

            return view('frontend.layouts.home',compact('metaContent','projects','testimonials'));




        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function subscribe(Request $request){

                try{

                    $subscription = UserSubscription::where('email',$request->email)->get()->first();

                    if($subscription == null){

                        $subscription = new UserSubscription;

                        $subscription->email = $request->email;

                        $subscription = UserSubscription::create($subscription->toArray());


                        return response()->json([
                            'status' => true,

                            'msg' => 'Subscription added successfully !'
                        ]);

                    }else{

                        return response()->json([
                            'status' => false,
                            'msg' => 'User already subscribed !'
                        ]);
                    }


                }catch(\Exception $exception){
                    $error = $exception->getMessage().' - line - '.$exception->getLine();

                    return response()->json([
                        'status' => false,
                        'msg' => $error
                    ]);

                }


     }


     public function navigationPlaning(Request $request){

        try{

            $serviceType = 1;

            $serviceType = ServiceType::with('services')->where('id',$serviceType)->get()->first();

            if($serviceType != null){

                return view('frontend.services.service_type_archive',compact('serviceType'));

            }else{

                $error = "Not found";
                return view('frontend.errors.error_404',compact('error'));

            }



        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }

     }


}