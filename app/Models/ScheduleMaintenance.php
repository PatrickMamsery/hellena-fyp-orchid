<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleMaintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'status',
        'last_maintenance',
        'next_maintenance'
    ];

    public function property() {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
