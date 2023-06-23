<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bedroom_id',
        'number',
        'created_at',
        'updated_at'  
      ];
    
    public function bedroom()
    {
        return $this->belongsTo(Bedroom::class);
    }
    
    public function sections()
    {
        return $this->hasMany(Section::class,'floor_id')->orderBy('created_at',"DESC");
    }

    public function rooms()
    {
        return $this->hasMany(Room::class,'floor_id')->orderBy('created_at',"DESC");
    }


}
