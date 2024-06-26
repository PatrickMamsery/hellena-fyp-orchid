<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
