<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon; // Make sure to import Carbon

class BalaigempaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // 1. Combine the date and time strings.
        $datetimeString = $this->tanggal . ' ' . $this->origin;

        // 2. Parse the string, telling Carbon it is already a UTC timestamp.
        $carbonDateTime = Carbon::parse($datetimeString, 'UTC');

        return [
            'type' => 'Feature',
            'properties' => [
                'id' => $this->id,
                'mag' => (float) $this->magnitudo,
                'place' => $this->ket,
                // 3. Format to the standard ISO 8601 UTC string.
                'time' => $carbonDateTime->toIso8601String(),
                'depth' => $this->depth,
                'status' => $this->type,
                'felt_reports' => $this->terasa,
                'impact' => $this->terdampak,
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [
                    (float) $this->bujur,
                    (float) $this->lintang,
                ]
            ]
        ];
    }
}