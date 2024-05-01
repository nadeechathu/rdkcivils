<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    use HasFactory;

    protected $fillable = ['task','status'];

    public static function getTasksListforFilters($searchKey){

        return ProjectTask::where('task','like','%'.$searchKey.'%')->paginate(env("RECORDS_PER_PAGE"));
        
    }
}
