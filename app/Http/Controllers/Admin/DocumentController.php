<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Http\Request;
use Auth;

class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getAllDocumentTypes(Request $request){
        
        $hasPermission = Auth::user()->hasPermission('view_document_types');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $documentTypes = DocumentType::paginate(env("RECORDS_PER_PAGE"));

            return view('admin.documents.all_document_types',compact('documentTypes','searchKey'));

        }else{

            return redirect('admin/not_allowed');

        }

    }

    public function addDocumentTypes(Request $request){
        
        try{

            $hasPermission = Auth::user()->hasPermission('add_document_types');

            if($hasPermission){

              
                $documentType = new DocumentType();
                $documentType->document_name = $request->document_name;
                $documentType->description = $request->description;
                $documentType->status = $request->status;
                $documentType->type = $request->type; //projects - to be edited if there is any other document type

                $savedType = DocumentType::create($documentType->toArray());

                //get all projects
                $projects = Project::all();

                foreach($projects as $project) {

                    $projectDocument = new ProjectDocument();

                    $projectDocument->project_id = $project->id;
                    $projectDocument->document_type_id = $savedType->id;
                    $projectDocument->status = 1;
                    $projectDocument->enabled = 0;
                    $projectDocument->locked = 0;

                    $projectDocument->save();
                }


                return back()->with('success','Document type added successfully !');

            }else{

                return redirect('admin/not_allowed');

            }

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }

    }

    public function editDocumentType(Request $request){

        try{

            $hasPermission = Auth::user()->hasPermission('edit_document_types');

            if($hasPermission){

              
                $documentType = DocumentType::where('id',$request->document_type_id)->get()->first();

                if($documentType != null){
                    
                    $documentType->document_name = $request->document_name;
                    $documentType->description = $request->description;
                    $documentType->status = $request->status;
                    $documentType->type = $request->type; //projects - to be edited if there is any other document type

                    $documentType->save();

                    return back()->with('success','Document type updated successfully !');

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

    public function removeDocumentType($id)

    {

        $hasPermission = Auth::user()->hasPermission('remove_document_types');

        if($hasPermission){


            $documenetType = DocumentType::where('id',$id)->get()->first();

            if($documenetType != null){

                DocumentType::where('id',$id)->delete();
                return back()->with('success','Document type deleted successfully');

            }else{

                return back()->with('error','Could not find the record to delete');
            }


        }else{

            return redirect('admin/not_allowed');

        }


    }
}
