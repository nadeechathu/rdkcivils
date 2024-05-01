<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;
use Auth;
use Str;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('view_services');

        if($hasPermission){

            $search = $request->searchKey;
            
            if($request->searchKey)
            {
                $services = Service::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->paginate(10);

                return view('admin.services.all_services',compact('services', 'search')) ->with('i', (request()->input('page', 1) - 1) * 10);

            } else {

                $services = Service::latest()->paginate(10);
                return view('admin.services.all_services',compact('services', 'search')) ->with('i', (request()->input('page', 1) - 1) * 10);

            }

        }else{

            return redirect('admin/not_allowed');

        }




    }


    /**
     * new service UI
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function newServiceUI(Request $request)
    {
        return view('admin.services.new_service');
    }


    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit_service', compact('service'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hasPermission = Auth::user()->hasPermission('add_services');

        if($hasPermission){

            // return $request;

            $request->validate([
                'meta_title'=>'required',
                'meta_description'=>'required',
                'name'=>'required',
                'slug'=>'required',
                'description'=>'required',
                'featured'=>'required',
                'image'=>'required|max:2048',
                'service_type'=>'required'
            ]);

            $image=$request->file('image');
            $new_name=rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/services/'),$new_name);

            $slug = Str::slug($request->slug, "-");


            $form_data=array(
                'name'=>$request->name,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'slug'=>$slug,
                'description'=>$request->description,
                'image'=>'images/services/'.$new_name,
                'status'=>$request->featured,
                'service_type'=>$request->service_type,
            );

            Service::create($form_data);

            return redirect()->route('services.all')->with('success','data store success');

        }else{

            return redirect('admin/not_allowed');

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hasPermission = Auth::user()->hasPermission('edit_services');

        if($hasPermission){

            $serviceCategories = Category::where('type',Category::SERVICE)->where('status',1)->get();
            $service = Post::getServiceForId($id);

            return view('admin.services.edit_service',compact('serviceCategories','service'));

        }else{

            return redirect('admin/not_allowed');

        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $hasPermission = Auth::user()->hasPermission('edit_services');

        if($hasPermission){

            $request->validate([
                'meta_title'=>'required',
                'meta_description'=>'required',
                'slug'=>'required',
                'name'=>'required',
                'description'=>'required',
                'status' => 'required',
                'service_type'=>'required'
            ]);

            $slug = Str::slug($request->slug, "-");

            $form_data= array(
                'name'=>$request->name,
                'meta_title'=>$request->meta_title,
                'meta_description'=>$request->meta_description,
                'description'=>$request->description,
                'status'=>$request->status,
                'service_type'=>$request->service_type,
                'slug'=>$slug,
            );
            
            $image=$request->file('image');  
        

            if ($image !='')
            {
                $image_name=rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('images/services/'),$image_name);

                $form_data['image']= 'images/services/'.$image_name;
              
            }

            Service::whereId($id)->update($form_data);

            return redirect()->route('services.all')->with('success','Successfully updated');

        }else{

            return redirect('admin/not_allowed');

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $hasPermission = Auth::user()->hasPermission('delete_services');

        if($hasPermission){

            $data=Service::find($id);
            $data->delete();

            return redirect()->back()
                ->with('success','data data deleted');

        }else{

            return redirect('admin/not_allowed');

        }



    }
}
