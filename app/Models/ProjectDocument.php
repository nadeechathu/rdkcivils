<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectDocument extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','document_type_id','document_src','status','locked','remarks','enabled'];

    public function document(){
        return $this->belongsTo(DocumentType::class, 'document_type_id', 'id');
    }

    public function documentHistories(){
        return $this->HasMany(ProjectDocumentHistory::class, 'project_document_id', 'id');
    }
}
