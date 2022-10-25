<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class LogbookRequest extends FormRequest
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
            'jadwal_dinas' => 'required',
            'tanggal'=> 'required',
            'petugas'=> 'required',
            'seiscomp'=> 'required',
            'nexstorm_petir'=> 'required',
            'accelero_system'=> 'required',
            'dvb'=> 'required',
            'jamstec'=> 'required',
            'jiesview'=> 'required',
            'diseminasi'=> 'required',
            'esdx'=> 'required',
            'magdas'=> 'required',
            'lemi'=> 'required',
            'hillman'=> 'required',
            'obs'=> 'required',
            'arws'=> 'required',
            'hv_sampler'=> 'required',
            'listrik_genset'=> 'required',
            'internet'=> 'required',
            'telefon'=> 'required',
            'ac'=> 'required',
            'air'=> 'required',
            'cctv'=> 'required',
            'intensitas_hujan'=> 'required',
            'data_nexstorm'=> 'required',
            'data_jamstec'=> 'required',
            'data_seismisitas'=> 'required',
            'berat_kertas'=> 'nullable',
            'counter_awal'=> 'nullable',
            'counter_akhire'=> 'nullable',
            'flow_rate_awal'=> 'nullable',
            'flow_rate_akhire'=> 'nullable',
            'hillman_intensitas'=> 'nullable',
            'obs_intensitas' => 'nullable',
            'armi'=> 'required',
            'arpi'=> 'required',
            'baki'=> 'required',
            'bndi'=> 'required',
            'dypi'=> 'required',
            'erpi'=> 'required',
            'faki'=> 'required',
            'fkmpm'=> 'required',
            'geni'=> 'required',
            'glmi'=> 'required',
            'iwpi'=> 'required',
            'jay'=> 'required',
            'kmpi'=> 'required',
            'kmpi'=> 'required',
            'kmsi'=> 'required',
            'krai'=> 'required',
            'ljpi'=> 'required',
            'mbpi'=> 'required',
            'mipi'=> 'required',
            'msai'=> 'required',
            'mtn'=> 'required',
            'nbpi'=> 'required',
            'rapi'=> 'required',
            'rkpi'=> 'required',
            'sani'=> 'required',
            'saui'=> 'required',
            'sjpm'=> 'required',
            'skpm'=> 'required',
            'smpi'=> 'required',
            'srpi'=> 'required',
            'stpi'=> 'required',
            'swi'=> 'required',
            'tami'=> 'required',
            'tle2'=> 'required',
            'tnti'=> 'required',
            'tspi'=> 'required',
            'wami'=> 'required',
            'wwpi'=> 'required',
            'website'=> 'required',
            // 'media_sosial'=> 'required',
            'keterangan' => 'nullable'
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
