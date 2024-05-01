<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\PropertyProperty;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = ['design_id','reference_id','bed_rooms','design_process_start','other_service','professionals','expecting_service','first_name','last_name','address','post_code','email','contact','message','hear_about_us','keep_me_update','extensions','services','professionals','parts','date','time','quotation_type'];

    
    public function design(){
        return $this->hasOne(PropertyDesign::class,'id','design_id');
    }

    public static function loadQuotations(){
        return Quotation::with('design')->orderBy('id','desc')->paginate(env('RECORDS_PER_PAGE'));
    }
}
