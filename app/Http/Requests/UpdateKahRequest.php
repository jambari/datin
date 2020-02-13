<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateKahRequest extends FormRequest
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
           'tahun' => 'required|numeric',
            'bulan' => 'required|numeric',
            'minggu' => 'required|numeric',
            /*'stasiun' => 'required',
            'lokasi' => 'required',
            'peha' => 'required|numeric',
            'deha' => 'required|numeric',
            'ce_a' => 'required|numeric',
            'ce_a' => 'required|numeric',
            'emge' => 'required|numeric',
            'en_a' => 'required|numeric',
            'ka_a' => 'required|numeric',
            'enha_empat' => 'required|numeric',
            'ce_el' => 'required|numeric',
            'so_empat' => 'required|numeric',
            'no_tiga' => 'required|numeric',
            'ka_te' => 'required|numeric',
            'ac_ac' => 'required|numeric',
            'al_al' => 'required|numeric',
            'ce_ha' => 'required|numeric',
            'ox_ox' => 'required|numeric'*/
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
