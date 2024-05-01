<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Testimonial;
use App\Models\UserInquiry;
use Illuminate\Http\Request;
use Auth;

class InquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $hasPermission = Auth::user()->hasPermission('view_inquiries');

        if($hasPermission){

            $inquiries = UserInquiry::orderBy('created_at','desc')->paginate(env("RECORDS_PER_PAGE"));
        
            return view('admin.inquiries.all_inquiries', compact('inquiries'));

        } else{ 

            return redirect('admin/not_allowed');

        }
         
    }


    
}
