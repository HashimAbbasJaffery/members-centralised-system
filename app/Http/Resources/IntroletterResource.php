<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IntroletterResource extends JsonResource
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
            "file_number" => $this->file_number,
            "date_of_applying" => $this->date_of_applying,
            "membership_number" => $this->member?->membership_number ?? "N/A",
            "member_name" => $this->member->name,
            "cnic_passport" => $this->member->passport,
            "date_of_birth" => $this->member->dob,
            "membership_status" => $this->member->membership_status
        ];
    }
}
