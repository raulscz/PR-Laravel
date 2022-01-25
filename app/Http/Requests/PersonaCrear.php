<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaCrear extends FormRequest
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
            'nombre_persona'=>'required|string|max:30',
            'apellido_persona'=>'required|string|max:30',
            'dni_persona'=>'required|string|max:10|min:10',
            'edad_persona'=>'required|int|min:18|max:130',
            'num_telf'=>'required|string|min:9|max:9',
            'num_telf2'=>'required|string|min:9|max:9',
            'foto_persona'=>'required|mimes:jpg,png,jpeg,webp,svg'
        ];
    }
}
