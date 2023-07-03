<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'lastname',
        'facultet',
        'group',
        'phone',
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
        return $this->belongsTo(Rooms::class);
    }
}
