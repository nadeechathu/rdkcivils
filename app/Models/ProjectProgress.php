<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $table = 'project_progress';

    protected $fillable= ['project_id','task','project_status_id','completed_on'];

    public function progressStatus(){

        return $this->belongsTo(TaskStatus::class,'project_status_id','id');
    }
}
