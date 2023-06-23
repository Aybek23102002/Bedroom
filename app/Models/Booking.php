<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'lastname',
        'facultet',
        'group',
        'bedroom_id',
        'floor_id',
        'room_id',
        'given_time',
        'return_time',
        
    ];

    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class);
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
