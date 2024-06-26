<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Property extends Model
{
    use AsSource;

    protected $fillable = [
        'name',
        'serial_no',
        'description',
        'type',
        'status',
        'college_block_id'
    ];

    public function collegeBlock(){
        return $this->belongsTo(CollegeBlock::class);
    }
}
