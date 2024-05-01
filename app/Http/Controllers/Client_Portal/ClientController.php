<?php

namespace App\Http\Controllers\Client_Portal;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectDocument;
use App\Models\ProjectDocumentHistory;
use App\Models\ProjectProgress;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('client.auth');
    }


    public function clientDashboard(Request $request){

        try {


           $projects = Project::getProjectsForUserAndFilters($request);

           $searchKey = $request->searchKey;

           return view('client_portal.layouts.home',compact('searchKey','projects'));


        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

    public function showSingleProject($slug){

        try {


            $project = Project::getClientProjectForSlug($slug);

            $projectDocuments = ProjectDocument::with('document', 'documentHistories')
            ->whereHas('document', function ($query) {
                $query->where('status', 1);
                $query->where('type', 0);
            })
            ->where('project_id', $project->id)
            ->where('enabled', 1)
            ->get();

            $customerDocuments = ProjectDocument::with('document', 'documentHistories')
            ->whereHas('document', function ($query) {
                $query->where('status', 1);
                $query->where('type', 1);
            })
            ->where('project_id', $project->id)
            ->where('enabled', 1)
            ->get();

            $allProgresses = ProjectProgress::where('project_id', $project->id)->count();

            $completedStatus = ProjectProgress::where('project_id', $project->id)->where('project_status_id', 3)->count();
            //complete Percentage
            if($allProgresses != 0) {
                $completePercentage = ($completedStatus / $allProgresses) * 100;
            } else {
                $completePercentage = 0;
            }


            if($project != null){

                return view('client_portal.projects.single_project_view',compact('project', 'projectDocuments', 'completePercentage', 'customerDocuments'));

            }else{

                return back()->with('error','Could not find the project to preview. Please contact support.');
            }


         } catch (\Exception $exception) {

             $error = $exception->getMessage();
             return view('frontend.errors.error_500', compact('error'));
         }

    }


    public function updateDocments(Request $request) {

        try {

            $documents = $request->file('documents');

            $count = 1;

            foreach ($documents as $documentId => $file) {

                $imageName = time() .'_'.$count. '.' . $file->extension();
                $file->move(public_path('project_documents/'), $imageName);
                $imageUrl = 'project_documents/' . $imageName;

               $uploadFile = ProjectDocument::where('id', $documentId)->first();

               if($uploadFile->document_src != null) {
                    ProjectDocumentHistory::create(array(
                    "project_document_id" => $documentId,
                    "document_src" => $uploadFile->document_src,
                    "created_date" => $uploadFile->updated_at
                 ));
               }

               $uploadFile->document_src = $imageUrl;

               $uploadFile->save();

               $count++;
            }


            return redirect()->back()->with('success', 'Files uploaded successfully.');

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }


    public function userProfileUI() {
        try {

            $user = Auth::user();
            $reviewList = Testimonial::where('user_id', $user->id)->where('status', 1)->orderBy('created_at','desc')->get();

            return view('client_portal.user_profile.profileUI', compact('user', 'reviewList'));

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

    public function updateUserDetails(Request $request) {
        try {

            $request->validate([
                'f_name'=>'required|string',
                'l_name'=>'required|string',
                'dob'=>'required',
                'email' =>'required|email',
                'phone' =>'required',
                'username' =>'required'
            ]);

            $userData = User::where('id', $request->user_id)->first();

            $userData->first_name = $request->f_name;
            $userData->last_name = $request->l_name;
            $userData->dob = $request->dob;
            $userData->phone = $request->phone;
            $userData->email = $request->email;
            $userData->username = $request->username;

            if($request->user_image != null) {
                $imageName = time() .'_'. $request->user_image->extension();
                $request->user_image->move(public_path('images/uploads/users/'), $imageName);
                $imageUrl = 'images/uploads/users/' . $imageName;

                $userData->user_image = $imageUrl;
            }

            $userData->save();

            return redirect()->back()->with('success', 'Profile updated successfully.');

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }


    public function addTestimonial(Request $request) {

        try {

            $user = Auth::user();
           
            $request->validate([
                'description'=>'required'
            ]);

            $testimonial = new Testimonial();

            $testimonial->description = $request->description;
            $testimonial->user_id = $user->id;
            $testimonial->status = 1;
            $testimonial->rating = $request->star;
            $testimonial->is_approved = 0;

            $testimonial->save();

            return redirect()->back()->with('success', 'Review added successfully.');

        } catch (\Exception $exception) {

            $error = $exception->getMessage();
            return view('frontend.errors.error_500', compact('error'));
        }
    }

}
