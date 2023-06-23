<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'bedroom_id'=>'required|numeric',
            'floor_id'=>'required|numeric',
            'section_id'=>'numeric',
            'number'=>'required|numeric',
            'place_count'=>'required|numeric',
            'status'=>'required|numeric'
        ];
    }
}
