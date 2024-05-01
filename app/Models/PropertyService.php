<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyService extends Model
{
    use HasFactory;

    protected $fillable = ['property_service_name','description','allow_comments','is_active'];

    public static function loadServices(){
            return PropertyService::orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }
    
    public function serviceItems(){
         return $this->hasMany(PropertyServiceItem::class)->where('is_active',1);
    }

    // Only active services for service item  module dropdown
    public static function getActiveServices(){
            return PropertyService::with('serviceItems')->where('is_active',1)->get();
    }

    public static function getService($id){
            return PropertyService::where('id',$id)->first();
    }


}
