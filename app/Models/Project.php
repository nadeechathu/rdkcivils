<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Auth;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','service_id','slug','location','budget','description','drawing','project','is_featured','user_id','project_start_date','project_end_date','project_status_id'];

    public function drawings(){

        return $this->hasMany(Image::class,'entity_id','id')->where('entity','drawing');
    }

    public function images(){

        return $this->hasMany(Image::class,'entity_id','id')->where('entity','project');
    }

    public function projectStatus(){

        return $this->belongsTo(ProjectStatus::class,'project_status_id','id');
    }

    public function projectProgress(){

        return $this->hasMany(ProjectProgress::class)->with('progressStatus')->orderBy('id','desc');
    }
    

    //get projects for the client
    public static function getProjectsForUserAndFilters($filters){


        return Project::with('images','drawings','projectStatus','projectProgress')
        ->where('user_id',Auth::user()->id)
        ->where(function($query) use($filters){

            if($filters->searchKey != null){

                $query->where('title','like','%'.$filters->searchKey.'%')->orWhere('location','like','%'.$filters->searchKey.'%');

            }else{

                $query;
            }
        })->get();

    }

    //get single project for the client using slug
    public static function getClientProjectForSlug($slug){

        return Project::with('images','drawings','projectStatus','projectProgress')->where('slug',$slug)->where('user_id',Auth::user()->id)->get()->first();
    }
}
