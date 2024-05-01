<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RecaptchaChecker;
use App\Models\UserInquiry;
use App\Models\EmailSender;
use App\Models\Post;
use App\Models\Resource;
use App\Models\Rule;
use App\Models\Image;
use Validator;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{


    public function loadServicesArchive(Request $request){

        try{

            $serviceTypes = ServiceType::where('status',1)->orderBy('id','desc')->get();

            return view('frontend.services.service_archive',compact('serviceTypes'));

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function loadServices($slug){



        try{


            $serviceType = ServiceType::with('services')->where('slug',$slug)->get()->first();



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



    public function loadPlaningArchive(){

        try{



            return view('frontend.services.planing_archive');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function loadServicesSingle($slug){

        try{

            $service = Service::with('projects')->where('slug',$slug)->get()->first();

            $metaContent = array(
                "page_title" => $service->meta_title,
                "meta_tag_description" => $service->meta_description,
                "meta_keywords" => "RDK Civil Engineering Limited"
            );


            return view('frontend.services.service_single',compact('service','metaContent'));

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function loadProjectsArchive(Request $request){

        try{


            $projects = Project::with('drawings','images')->where('status',1)->get();

            return view('frontend.projects.project_archive',compact('projects'));

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function loadProjectsSingle($slug){

        try{

            $project = Project::with('drawings','images')->where('status',1)->where('slug',$slug)->get()->first();

            if($project != null){

                return view('frontend.projects.project_single',compact('project'));

            }else{

                $error = "The page you are looking for not found";
                return view('frontend.errors.error_404',compact('error'));
            }

            return view('frontend.projects.project_single');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


 public function loadBlogsArchive(Request $request){

        try{

            $blogs = Post::with('image','images','featuredImage','user')->where('status',1)->orderBy('id','desc')->paginate(env("RECORDS_PER_PAGE_RESOURCES"));

            return view('frontend.blogs.blogs-archive',compact('blogs'));

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function loadBlogsSingle($slug){

        try{

            $blog = Post::with('image','images','featuredImage','user')->where('slug', $slug)->get()->first();

            $otherBlogs = Post::with('image','images','featuredImage')->whereNotIn('id', [$blog->id])->get();

            if($blog != null){

                return view('frontend.blogs.blog-single',compact('blog','otherBlogs'));

            }else{

                $error = "The page you are looking for not found";
                return view('frontend.errors.error_404',compact('error'));
            }


        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function loadContactUs(){

        try{

            return view('frontend.contact_us.contact_us');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function submitContactUs(Request $request)
    {

        $validated = $request->validate(
            [
                'first_name' => 'required|max:255',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
                'g-recaptcha-response' => 'required'
            ],
            [
                "g-recaptcha-response.required" => "Please mark reCAPTCHA security checks and try again"

            ]
        );



        try {



            $input = $request->all();

            $recaptchaCheckResponse = RecaptchaChecker::checkRecaptchaVaidity($input['g-recaptcha-response']);

            if($recaptchaCheckResponse != null){

                if(!$recaptchaCheckResponse['success']){

                    return back()->with('error','Please mark the recaptcha security checks');
                }

            }else{
                return back()->with('error','Recaptcha error. Kindly contact support.');
            }


            //saving inquiry
            $inquiry = new UserInquiry;

            $inquiry->first_name = $request->first_name;
            $inquiry->last_name = '';
            $inquiry->email = $request->email;
            $inquiry->phone = $request->phone;
            $inquiry->message = $request->message;
            $inquiry->subject = $request->subject;

            $savedInquiry = UserInquiry::create($inquiry->toArray());


            //sending customer email alerts
           EmailSender::sendUserInquryEmail($savedInquiry->id);

            return back()->with('success', 'Your inquiry submitted successfully !');
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
    }

    public function loadOurStory(){


        try{

            return view('frontend.story.story');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function loadFaq(){


        try{

            return view('frontend.faq.faq');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }


    public function loadTermsConditions(){

        try{

            return view('frontend.terms_conditions.terms_conditions');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function loadPrivacyPolicy(){

        try{

            return view('frontend.privacy_policy.privacy_policy');

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
            return view('frontend.errors.error_500',compact('error'));
        }
    }

    public function submitReview(Request $request) {

        try {

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ]);

            // This is a guest user front-end add testimonial function. Define guest user as zero.
            $guestUserId = 0;

            $testimonial = new Testimonial();
            $testimonial->name = $request->name;
            $testimonial->email = $request->email;
            $testimonial->description = $request->description;
            $testimonial->user_id = $guestUserId;
            $testimonial->status = 1;
            $testimonial->rating = $request->star;
            $testimonial->is_approved = 0;

            $testimonial->save();
            //sending customer  review reply
            EmailSender::sendCustomerReviewReply($testimonial->id);

            return response()->json([
                'status' => true,
                'message' => 'We have received your feedback. Thank you !'
            ]);

        } catch(\Exception $exception) {

            $error = $exception->getMessage().' - line - '.$exception->getLine();

            return response()->json([
                'status' => false,
                'message' => $error
            ]);

        }
    }

}
