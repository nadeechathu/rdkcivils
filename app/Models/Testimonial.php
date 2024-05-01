<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','user_id','status','is_approved'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
