<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBedroomRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'number'=>'required|numeric',
            'floor_count'=>'required|numeric',
            'room_count'=>'required|numeric',
            'section_status'=>'numeric|boolean'
        ];
    }
}
