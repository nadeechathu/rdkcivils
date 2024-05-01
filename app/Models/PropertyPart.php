<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPart extends Model
{
    use HasFactory;


    protected $fillable = ['part_name','image','description','is_active'];

    const DEACTIVE = 0;
    const ACTIVE = 1;


    public function itemsForProperties(){
        return  $this->hasMany(PropertyPartItem::class,'property_parts_id','id');
    }

    public static function getAllPropertyParts(){
        return  PropertyPart::orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }

    // For dropdown  property part items module
    public static function loadPropertyParts(){
        return  PropertyPart::where('is_active',1)->orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }

    // *** find property
    public static function getPropertyPart($id){
        return PropertyPart::where('id',$id)->first();
    }


       // Frontend quotation page
    public static function loadActiveParts(){
         return  PropertyPart::with('itemsForProperties')->where('is_active',1)->orderBy('id', 'desc')->get();
    }


}

