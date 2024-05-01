<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
      use HasFactory;

      protected $fillable = ['name','slug','description','image','status','service_type','meta_title','meta_description'];

      public function projects(){

            return $this->hasMany(Project::class)->with('images','drawings')->where('status',1);
            
      }


}
