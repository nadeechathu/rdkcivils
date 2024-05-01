<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $hasPermission = Auth::user()->hasPermission('view_categories');

        if($hasPermission){

            $searchKey = $request->searchKey;

            $categories = Category::getCategoriesForFilters($searchKey);

            $all_categories = Category::all();

            return view('admin.categories.all_categories',compact('categories','searchKey','all_categories'));

        }else{
           return redirect('admin/not_allowed');
        }

    }


    public function store(Request $request){


        $hasPermission = Auth::user()->hasPermission('add_categories');

        if($hasPermission){

            $validated = $request->validate([
                'category_name' => ['required', 'max:255'],
                'slug' => ['required', 'max:255'],
                'type' => ['required'],
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=50,min_height=50,max_width=2000,max_height=2000',
            ],
            [
                'image.required' => 'Category image required.',
                'image.mimes' => 'Image types should be jpg,png,jpeg.',
                'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',

            ]);
          


            $category = new Category;
            $category->category_name = $request->category_name;
            $category->category_description = $request->category_description;
            $category->slug = $request->slug;
            $category->status = Category::ACTIVE;
            $category->type = $request->type;
            $category->page_title = $request->page_title;
            $category->meta_tag_description = $request->meta_tag_description;
            $category->meta_keywords = $request->meta_keywords;
            $category->canonical_url = $request->canonical_url;

            if($request->file('image')){

                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/uploads/categories/'), $imageName);
                $imageUrl ='images/uploads/categories/' . $imageName;


                if($request->cat_type != "1"){

                    $category->category_image = $imageUrl;

                }else{

                    $category->sub_category_image = $imageUrl;
                }
            }


            $savedCategory = Category::create($category->toArray());

            return back()->with('success','Category created successfully !');

        }else{
           return redirect('admin/not_allowed');
        }

    }

    public function update(Request $request){

        $hasPermission = Auth::user()->hasPermission('edit_categories');

        if($hasPermission){


                    $validated = $request->validate([
                        'category_name' => ['required', 'max:255'],
                        'slug' => ['required', 'max:255'],
                        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=50,min_height=50,max_width=2000,max_height=2000',
                        'type' => ['required']
                    ],
                    [
                        'image.required' => 'Category image required.',
                        'image.mimes' => 'Image types should be jpg,png,jpeg.',
                        'image.dimensions' => 'Please upload the images with the mentioned image dimentions.',

                    ]);

                    $category = Category::where('id',$request->category_id)->get()->first();

                    if($category != null){

                        $category->category_name = $request->category_name;
                        $category->category_description = $request->category_description;
                        $category->slug = $request->slug;
                        $category->type = $request->type;
                        $category->page_title = $request->page_title;
                        $category->meta_tag_description = $request->meta_tag_description;
                        $category->meta_keywords = $request->meta_keywords;
                        $category->canonical_url = $request->canonical_url;

                        if($request->file('image')){

                            $imageName = time().'.'.$request->image->extension();
                            $request->image->move(public_path('images/uploads/categories/'), $imageName);
                            $imageUrl = 'images/uploads/categories/' . $imageName;

                            $category->category_image = $imageUrl;
                        }

                        $category->save();

                        return back()->with('success','Category updated successfully !');

                    }else{
                        return back()->with('error','Could not find the category');
                    }




        }else{
           return redirect('admin/not_allowed');
        }

    }


    public function remove($id){

        $hasPermission = Auth::user()->hasPermission('delete_categories');

        if($hasPermission){

            try{

                Post::where('category_id',$id)->update(['category_id'=> null]);

                Category::where('id',$id)->delete();

                return back()->with('success','Category removed successfully !');

            }catch(\Exception $exception){

                return back()->with('error','Error occured - '.$exception->getMessage());
            }

        }else{
           return redirect('admin/not_allowed');
        }


    }

    
}
