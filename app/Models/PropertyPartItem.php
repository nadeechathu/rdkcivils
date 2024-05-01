<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PropertyPart;

class PropertyPartItem extends Model
{
    use HasFactory;

    protected $fillable = ['property_parts_id','part_item_name','image','description','is_active'];



    public function propertyPart(){
         return $this->hasOne(PropertyPart::class, 'id','property_parts_id');
    }

 
    public static function loadAllPropertyItems(){
        return  PropertyPartItem::with('propertyPart')->orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }


    public static function getPropertyPartItem($id){
        return  PropertyPartItem::with('propertyPart')->where('id',$id)->first();
    }


}
