<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSummaryRequest extends FormRequest
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
            'tanggal' => 'required',
            'stroke' => 'required|integer',
            'average_stroke' => 'required|numeric',
            'flash' => 'required|integer',
            'average_flash' => 'required|numeric',
            'noise' => 'required|integer',
            'average_noise' => 'required|numeric',
            'energy' => 'required|integer',
            'average_energy' => 'required|numeric',
            'peak_stroke' => 'required|integer',
            'time_stroke' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_flash' => 'required|integer',
            'time_flash' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_noise' => 'required|integer',
            'time_noise' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_energy' => 'required|integer',
            'time_energy' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'energy_ratio' => 'required|integer',
            'time_ratio' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
            'peak_signal' => 'required|integer',
            'time_signal' => ['required','regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?)$^'],
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
