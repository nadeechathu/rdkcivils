<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationExtension extends Model
{
    use HasFactory;

    protected $fillable = ['quotation_id','property_part_item_id','property_part_id'];
}
