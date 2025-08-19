<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HujanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'tanggal'   => $this->tanggal,
            'hilman'    => $this->hilman,
            'obs'       => $this->obs,
            'kategori'  => $this->kategori,
            'keterangan'=> $this->keterangan,
            'petugas'   => $this->petugas,
        ];
    }
}

