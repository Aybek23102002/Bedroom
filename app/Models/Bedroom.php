<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Bedroom extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'number',
      'floor_count',
      'room_count',
      'section_status',
      'created_at',
      'updated_at'  
    ];

    public function floors(){
        return $this->hasMany(Floor::class,'bedroom_id')->orderBy('created_at',"DESC");
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
}
