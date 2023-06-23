<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'bedroom_id',
        'floor_id',
        'section_id',
        'number',
        'place_count',
        'status'
    ];

    public function bedroom(){
        return $this->belongsTo(Bedroom::class);
    }

    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
