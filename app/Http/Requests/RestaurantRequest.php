<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Webpatser\Uuid\Uuid;

class RestaurantRequest extends FormRequest
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
            'name' => 'required',
            'rating' => 'required|numeric|between:0,4',
            'site' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric'
        ];
    }
}
