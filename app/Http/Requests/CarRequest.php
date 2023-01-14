<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required|integer|min:1900|max:2022',
            'max_speed' => 'required|integer|min:20|max:300',
            'is_automatic' => 'required|boolean',
            'engine' => 'required',
            'number_of_doors' => 'required|integer'
        ];
    }
}
