<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDesign extends Model
{
    use HasFactory;

    protected $fillable = ['design_name','icon_1','icon_2','image','description'];

    const DEACTIVE = 0;
    const ACTIVE = 1;

    public static function getAllQuotations(){
            return  PropertyDesign::orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }

    // Frontend quotation page
    public static function loadActiveDesign(){
            return  PropertyDesign::where('is_active',1)->orderBy('id', 'desc')->paginate(env('RECORDS_PER_PAGE'));
    }





}
