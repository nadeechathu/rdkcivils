<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $serviceTypes = ServiceType::all();
         return view('admin.service_types.all_services', compact('serviceTypes'));
    }

    public function createServiceType(Request $request){

        $validated = $request->validate([
            'name' => 'required', 'max:255',
            'slug' => 'required', 'max:255',
            'description' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:width=702,height=536',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:width=2165,height=630',
            'status' => 'required'
        ]);
      
        try{

            $serviceType = new ServiceType;

            $serviceType->name = $request->name;
            $serviceType->description = $request->description;
            $serviceType->slug = $request->slug;
            $serviceType->status = $request->status;

            if($request->file('image')){

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/uploads/service_types/'), $imageName);
                $imageUrl ='images/uploads/service_types/' . $imageName;


                $serviceType->image = $imageUrl;
            }

            if($request->file('thumbnail')){

                $imageName = time().'_thumb.'.$request->thumbnail->extension();
                $request->thumbnail->move(public_path('images/uploads/service_types/thumbs/'), $imageName);
                $imageUrl ='images/uploads/service_types/thumbs/' . $imageName;


                $serviceType->thumbnail = $imageUrl;
            }

            ServiceType::create($serviceType->toArray());

            return back()->with('success','Service type created successfully !');

        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }


    }

    public function updateServiceType(Request $request){

        $validated = $request->validate([
            'name' => 'required', 'max:255',
            'slug' => 'required', 'max:255',
            'description' => 'required',
            'thumbnail' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:width=702,height=536',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:width=2165,height=630',
            'status' => 'required'
        ]);
      
        try{

            $serviceType = ServiceType::where('id',$request->service_type_id)->get()->first();

            if($serviceType != null){

                $serviceType->name = $request->name;
                $serviceType->description = $request->description;
                $serviceType->slug = $request->slug;
                $serviceType->status = $request->status;

                if($request->file('image')){

                    $imageName = time().'.'.$request->image->extension();
                    $request->image->move(public_path('images/uploads/service_types/'), $imageName);
                    $imageUrl ='images/uploads/service_types/' . $imageName;


                    $serviceType->image = $imageUrl;
                }

                if($request->file('thumbnail')){

                    $imageName = time().'_thumb.'.$request->thumbnail->extension();
                    $request->thumbnail->move(public_path('images/uploads/service_types/thumbs/'), $imageName);
                    $imageUrl ='images/uploads/service_types/thumbs/' . $imageName;
    
    
                    $serviceType->thumbnail = $imageUrl;
                }

                $serviceType->save();

                return back()->with('success','Service type updated successfully !');

            }else{

                return back()->with('error','Could not find the service type to update');
            }


        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }


    }

    public function removeServiceType($id){

        try{

            $deleted = ServiceType::where('id',$id)->delete();

            if($deleted){

                return back()->with('success','Service type deleted successfully !');
            }else{
                return back()->with('error','Could not delete the service type !');
            }
            
        }catch(\Exception $exception){

            return back()->with('error',$exception->getMessage());
        }
    }
}
