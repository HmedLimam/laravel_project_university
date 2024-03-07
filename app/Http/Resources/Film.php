<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Film extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "titre" => $this->titre,
            "description" => $this->description,
            "anneesortie" => $this->anneesortie,
            "duree" => $this->duree,
            "categorie" => $this->categorie,
        ];
    }
}
