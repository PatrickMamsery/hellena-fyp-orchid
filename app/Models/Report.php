<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'cost',
        'description',
        'status',
        'date',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
