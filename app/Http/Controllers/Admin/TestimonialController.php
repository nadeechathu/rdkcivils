<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Auth;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $hasPermission = Auth::user()->hasPermission('view_testimonials');

        if($hasPermission){

            $testimonials = Testimonial::with('user')->orderBy('created_at', 'DESC')->paginate(env("RECORDS_PER_PAGE"));
        
            return view('admin.testimonials.all_testimonials', compact('testimonials'));

        } else{ 

            return redirect('admin/not_allowed');

        }
         
    }

    public function addReview(Request $request) {

        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        try {

            $testimonial = new Testimonial();

            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->status = 1;
            $testimonial->rating = $request->star;
            $testimonial->is_approved = 1;

            $testimonial->save();

            return redirect()->back()->with('success', 'Review added successfully.');

        } catch(\Exception $exception){

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }


    public function editReview(Request $request) {

        try {

            $testimonial = Testimonial::where('id', $request->testimonial_id)->first();
            $testimonial->name = $request->name;
            $testimonial->description = $request->description;
            $testimonial->rating = $request->star;

            $testimonial->save();

            return redirect()->back()->with('success', 'Review editted successfully.');

        } catch(\Exception $exception){

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }


    public function approveReview(Request $request) {
        
        try {

            $hasPermission = Auth::user()->hasPermission('approve_testimonial');

            if($hasPermission){

                $testimonial = Testimonial::where('id', $request->testimonial_id)->first();

                $testimonial->is_approved = 1;

                $testimonial->save();

                return back()->with('success','Review approved successfully !');


            } else{

                return redirect('admin/not_allowed');

            }

        } catch(\Exception $exception){

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }


    public function changeStatusReview(Request $request) {
        try {

            $hasPermission = Auth::user()->hasPermission('changeStatus_testimonial');

            if($hasPermission){

                $testimonial = Testimonial::where('id', $request->testimonial_id)->first();

                $testimonial->status = $request->status;

                $testimonial->save();

                return back()->with('success','Review status changed successfully !');

            } else{

                return redirect('admin/not_allowed');

            }

        } catch(\Exception $exception){

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }



    public function removeReview(Request $request)
    {
        $testimonial = Testimonial::where('id', $request->id)->get()->first();

        if ($testimonial != null)
        {
            $testimonial = Testimonial::where('id', $request->id)->delete();
            return back()->with('success', 'Site Review removed successfully !');
        }
        else
        {
            return back()->with('error', 'Could not find the site Review');
        }
    }
}
