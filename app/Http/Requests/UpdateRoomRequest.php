<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
