<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\Image;
use App\Models\Project;
use App\Models\ProjectDocument;
use App\Models\ProjectDocumentHistory;
use App\Models\ProjectProgress;
use App\Models\ProjectStatus;
use App\Models\ProjectTask;
use App\Models\Service;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Str;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_projects');

        if($hasPermission){


            if ($request->searchKey){

                $searchKey = $request->searchKey;

                $projects = Project::where('title', 'LIKE', "%".$searchKey."%")
                    ->paginate(env("RECORDS_PER_PAGE"));

                return view('admin.projects.all_project', compact('projects','searchKey'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);

            }else {

                $projects = Project::latest()->paginate(10);
                return view('admin.projects.all_project', compact('projects'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);

            }


        }else{

            return redirect('admin/not_allowed');

        }




    }

    public function getProjectProgress($id, Request $request){
        
        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $project = Project::where('id',$id)->get()->first();
            $projectProgress = ProjectProgress::with('progressStatus')->where('project_id',$id)->orderBy('id','desc')->paginate(env("RECORDS_PER_PAGE"));
            $projectStatuses = TaskStatus::where('status',1)->get();

            return view('admin.projects.project_progress',compact('project','projectProgress','projectStatuses'));

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function addProjectProgress(Request $request){
        
        try{

            $hasPermission = Auth::user()->hasPermission('edit_projects');

            if($hasPermission){

                $request->validate([
                    'task'=>'required',
                ]);
              
                $progress = new ProjectProgress;
                $progress->task = $request->task;
                $progress->project_status_id = $request->project_status_id;
                $progress->completed_on = $request->completed_on;
                $progress->project_id = $request->project_id;

                ProjectProgress::create($progress->toArray());

                return back()->with('success','Record added successfully !');

            }else{

                return redirect('admin/not_allowed');

            }

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }

    public function editProjectProgress(Request $request){
        
        try{

            $hasPermission = Auth::user()->hasPermission('edit_projects');

            if($hasPermission){

              
                $progress = ProjectProgress::where('id',$request->progress_id)->get()->first();

                if($progress != null){
                    
                    $progress->task = $request->task;
                    $progress->project_status_id = $request->project_status_id;
                    $progress->completed_on = $request->completed_on;

                    $progress->save();

                    return back()->with('success','Record updated successfully !');

                }else{

                    return back()->with('error','Could not find the record to update');
                }


            }else{

                return redirect('admin/not_allowed');

            }

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }

    public function removeProgress($id)

    {

        $hasPermission = Auth::user()->hasPermission('delete_projects');

        if($hasPermission){


            $progress = ProjectProgress::where('id',$id)->get()->first();

            if($progress != null){

                ProjectProgress::where('id',$id)->delete();
                return back()->with('success','Record deleted successfully');

            }else{

                return back()->with('error','Could not find the record to delete');
            }


        }else{

            return redirect('admin/not_allowed');

        }


    }

    public function create()
    {

        $services = Service::where('status',1)->get();
        $allClients = User::getAllClients();
        $projectStatuses = ProjectStatus::where('status',1)->get();


       return view('admin.projects.new_project',compact('services','allClients','projectStatuses'));
    }


    public function store(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('add_projects');

        if($hasPermission){

            $request->validate([
                'title'=>'required',
                'slug'=>'required',
                // 'location'=>'required',
                // 'budget'=>'required',
                'description'=>'required',
                'drawing'=>'required|max:2048',
                'project'=>'required|max:2048'
            ]);

            $slug = Str::slug($request->slug, "-");


            $form_data=array(
                'title'=>$request->title,
                'slug'=>$slug,
                'location'=>$request->location,
                'budget'=>$request->budget,
                'description'=>$request->description,
                'status' => $request->status,
                'service_id' => $request->service_id,
                'is_featured' => $request->is_featured,
                'user_id'=>$request->user_id,
                'project_start_date' => $request->project_start_date,
                'project_end_date' => $request->project_end_date,
                'project_status_id' => $request->project_status_id
            );


            $project = Project::create($form_data);

            $documentTypes = DocumentType::all();

            foreach($documentTypes as $documentType) {

                $projectDocument = new ProjectDocument();

                $projectDocument->project_id = $project->id;
                $projectDocument->document_type_id = $documentType->id;
                $projectDocument->status = 1;
                $projectDocument->enabled = 0;
                $projectDocument->locked = 0;

                $projectDocument->save();
            }

            if ($request->drawing)
            {
                foreach($request->drawing as $key => $image)
                {
                    $imageName = time().rand(1,99).'.'.$image->extension();
                    $image->move(public_path('/images/projects/'), $imageName);

                    $form_data=array(
                        'src'=>'images/projects/'.$imageName,
                        'status'=> 1,
                        'entity'=> 'drawing',
                        'entity_id'=> $project->id
                    );

                    Image::create($form_data);

                }

            }

            if($request->project)
            {
                foreach($request->project as $key => $image)
                {
                    $imageName = time().rand(1,99).'.'.$image->extension();
                    $image->move(public_path('/images/projects/'), $imageName);

                    $form_data=array(
                       'src'=>'images/projects/'.$imageName,
                        'status'=> 1,
                        'entity'=> 'project',
                        'entity_id'=> $project->id,
                    );

                    Image::create($form_data);
                }
            }

            //assigning project tasks
            $tasks = ProjectTask::where('status',1)->get();

            foreach($tasks as $task){

                $progress = new ProjectProgress;

                $progress->task = $task->task;
                $progress->project_id = $project->id;
                
                ProjectProgress::create($progress->toArray());
            }

            return redirect()->route('project.index')->with('success','New Project Stored Successfully');

        }else{

            return redirect('admin/not_allowed');

        }


    }


    public function edit($id){

        $project = Project::find($id);
        $services = Service::where('status',1)->get();
        $allClients = User::getAllClients();
        $drawing_images = Image::where('entity','=','drawing')->where('entity_id','=',$project->id)->get();
        $project_images = Image::where('entity','=','project')->where('entity_id','=',$project->id)->get();
        $projectStatuses = ProjectStatus::where('status',1)->get();

        $projectDocuments = ProjectDocument::with('document', 'documentHistories')
        ->whereHas('document', function ($query) {
            $query->where('status', 1);
            $query->where('type', 0);
        })
        ->where('project_id', $id)
        ->where('status', 1)
        ->get();

        $customerDocuments = ProjectDocument::with('document', 'documentHistories')
        ->whereHas('document', function ($query) {
            $query->where('status', 1);
            $query->where('type', 1);
        })
        ->where('project_id', $id)
        ->where('status', 1)
        ->get();

        return view('admin.projects.edit_project',compact('project','drawing_images','project_images','services','allClients','projectStatuses','projectDocuments','customerDocuments'));
    }


    public function update(Request $request, $id)
    {

		
        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $request->validate([
                'title'=>'required',
                'slug'=>'required',
                // 'location'=>'required',
                // 'budget' =>'required',
                'description' =>'required',
            ]);

            $slug = Str::slug($request->slug, "-");

            $documentIds = $request->input('document', []);
            $lockedIds = $request->input('locked', []);

            $form_data= array(
                'title'=>$request->title,
                'slug'=>$slug,
                'location'=>$request->location,
                'budget'=>$request->budget,
                'description'=>$request->description,
                'status' => $request->status,
                'service_id' => $request->service_id,
                'is_featured' => $request->is_featured,
                'user_id'=>$request->user_id,
                'project_start_date' => $request->project_start_date,
                'project_end_date' => $request->project_end_date,
                'project_status_id' => $request->project_status_id
            );


            Project::whereId($id)->update($form_data);

            //Enabling selected document types for the project
            ProjectDocument::whereIn('id', $documentIds)->update(["enabled" => 1]);
            ProjectDocument::whereNotIn('id', $documentIds)->where('project_id', $id)->update(["enabled" => 0]);

            //Locked selected document type
            ProjectDocument::whereIn('id', $lockedIds)->update(["locked" => 1]);
            ProjectDocument::whereNotIn('id', $lockedIds)->where('project_id', $id)->update(["locked" => 0]);

            if($request->drawing)
            {
                foreach($request->drawing as $key => $image)
                {
                    $imageName = time().rand(1,99).'.'.$image->extension();
                    $image->move(public_path('/images/projects/'), $imageName);

                    $form_data=array(
                        'src'=>'images/projects/'.$imageName,
                        'status'=> 1,
                        'entity'=> 'drawing',
                        'entity_id'=> $id,
                    );

                    Image::create($form_data);

                }

            }

            if($request->project)
            {

                foreach($request->project as $key => $image)
                {
                    $imageName = time().rand(1,99).'.'.$image->extension();
                    $image->move(public_path('/images/projects/'), $imageName);

                    $form_data=array(
                        'src'=>'images/projects/'.$imageName,
                        'status'=> 1,
                        'entity'=> 'project',
                        'entity_id'=> $id,
                    );

                    Image::create($form_data);
                }
            }

            $documents = $request->file('documents');

            $count = 1;

			if($documents != null){
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
			}



            return redirect()->route('project.index')->with('success','New Project Update Successfully');


        }else{

            return redirect('admin/not_allowed');

        }
		
	



    }

    public function show()
    {

    }


    public function destroy($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_projects');

        if($hasPermission){


            $data=Image::find($id);
            $data->delete();

            return redirect()->back()
                ->with('success','data deleted successfully');

        }else{

            return redirect('admin/not_allowed');

        }


    }



    public function delete($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_projects');

        if($hasPermission){

            $data=Project::find($id);
            $data->delete();

            return redirect()->back()
                ->with('success','project deleted successfully');


        }else{

            return redirect('admin/not_allowed');

        }



    }

    public function tasksList(Request $request){


        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $tasks = ProjectTask::getTasksListforFilters($searchKey);

            return view('admin.projects.tasks_list',compact('tasks','searchKey'));


        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function addNewTask(Request $request){


        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $task = new ProjectTask;

            $task->task = $request->task;
            $task->status = $request->status;

            ProjectTask::create($task->toArray());

            //assigning new task to projects
            $projects = Project::all();

            foreach($projects as $project){

                $progress = new ProjectProgress;

                $progress->task = $request->task;
                $progress->project_id = $project->id;
                
                ProjectProgress::create($progress->toArray());
            }

            return back()->with('success','Task created successfully');


        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function editTask(Request $request){


        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $task = ProjectTask::where('id',$request->task_id)->get()->first();

            if($task != null){

                $task->task = $request->task;
                $task->status = $request->status;

                $task->save();
                
                return back()->with('success','Task update successfully');

            }else{

                return back()->with('error','Could not find the task to update');

            }


        }else{

            return redirect('admin/not_allowed');

        }
    }

    public function removeTask($id){


        $hasPermission = Auth::user()->hasPermission('edit_projects');

        if($hasPermission){

            $taskDeleted = ProjectTask::where('id',$id)->delete();

            if($taskDeleted){
                
                return back()->with('success','Task deleted successfully');

            }else{

                return back()->with('error','Could not find the task to delete');

            }


        }else{

            return redirect('admin/not_allowed');

        }
    }



}
