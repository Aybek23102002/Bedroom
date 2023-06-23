<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'name'=>'required',
            'lastname'=>'required',
            'facultet'=>'required',
            'group'=>'required',
            'bedroom_id'=>'required|numeric',
            'floor_id'=>'required|numeric',
            'room_id'=>'required|numeric',
            'given_time'=>'required|date',
            'return_time'=>'required|date'
        ];
    }
}
