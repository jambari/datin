<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBalaiguestRequest extends FormRequest
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
            'nama' => 'required',
            'dari' => 'required',
            'keperluan' => 'required',
            'foto' => 'required'
        ];
    }

    //pesan error
    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'dari.required' => 'Dari harus diisi',
            'keperluan.required' => 'Keperluan harus diisi',
        ];
    }
}
