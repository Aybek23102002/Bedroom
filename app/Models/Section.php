<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bedroom_id',
        'floor_id',
        'number',
        'status'
    ];

    public function bedroom(){
        return $this->belongsTo(Bedroom::class);
    }

    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class,'section_id')->orderBy('created_at',"DESC");
    }
}
