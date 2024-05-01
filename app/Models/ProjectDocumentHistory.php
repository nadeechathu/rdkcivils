<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDocumentHistory extends Model
{
    use HasFactory;

    protected $fillable = ['project_document_id','document_src','created_date'];
}
