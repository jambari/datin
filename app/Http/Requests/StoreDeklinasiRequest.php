<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeklinasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
          'tanggal' => 'required|unique:deklinasis,tanggal',
            'jam00' => 'numeric|between:2.9,4.5',
            'jam01' => 'numeric|between:2.9,4.5',
            'jam02' => 'numeric|between:2.9,4.5',
            'jam03' => 'numeric|between:2.9,4.5',
            'jam04' => 'numeric|between:2.9,4.5',
            'jam05' => 'numeric|between:2.9,4.5',
            'jam06' => 'numeric|between:2.9,4.5',
            'jam07' => 'numeric|between:2.9,4.5',
            'jam08' => 'numeric|between:2.9,4.5',
            'jam09' => 'numeric|between:2.9,4.5',
            'jam10' => 'numeric|between:2.9,4.5',
            'jam11' => 'numeric|between:2.9,4.5',
            'jam12' => 'numeric|between:2.9,4.5',
            'jam13' => 'numeric|between:2.9,4.5',
            'jam14' => 'numeric|between:2.9,4.5',
            'jam15' => 'numeric|between:2.9,4.5',
            'jam16' => 'numeric|between:2.9,4.5',
            'jam17' => 'numeric|between:2.9,4.5',
            'jam18' => 'numeric|between:2.9,4.5',
            'jam19' => 'numeric|between:2.9,4.5',
            'jam20' => 'numeric|between:2.9,4.5',
            'jam21' => 'numeric|between:2.9,4.5',
            'jam22' => 'numeric|between:2.9,4.5',
            'jam23' => 'numeric|between:2.9,4.5',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
