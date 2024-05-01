<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProfessional extends Model
{
    use HasFactory;

    protected $fillable = ['quotation_id','property_service_item_id'];
}
