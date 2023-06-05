<?php

namespace App\Http\Requests;

use App\Rules\horaE;
use Illuminate\Foundation\Http\FormRequest;

class solicitudRequest extends FormRequest
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
            'auto'=>'required',
            'fecha'=>'after_or_equal:tomorrow',
            'horaE'=>[new horaE],
        ];
    }
}
