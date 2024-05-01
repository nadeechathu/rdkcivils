<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $fillable = [
        'name', 'status', 'description','image','slug','thumbnail'
    ];

    public function services(){
        return $this->hasMany(Service::class,'service_type','id');
    }
}
