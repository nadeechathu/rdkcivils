<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyServiceItem extends Model
{
    use HasFactory;

    protected $fillable = ['property_service_id','property_service_item_name','description','is_active'];


    public function propertyServiceItem(){
        return $this->hasOne(PropertyService::class, 'id','property_services_id');
    }


    public static function loadServiceItems(){
            return PropertyServiceItem::orderBy('id','desc')->paginate(env('RECORDS_PER_PAGE'));
    }

    public static function getServiceItem($id){
            return PropertyServiceItem::where('id',$id)->first();
    }

}
