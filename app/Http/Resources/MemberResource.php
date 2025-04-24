<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "current" => $this->current,
            "gender" => $this->gender,
            "dob" => $this->dob,
            "passport" => $this->passport,
            "cnic" => $this->cnic,
            "adress" => $this->adress,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "profession" => $this->position,
            "designation" => $this->profession,
            "organization" => $this->organization,
            "income" => $this->income,
            "applying" => $this->applying,
            "highlighted" => $this->highlighted
        ];
    }
}
