<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecoveryResource extends JsonResource
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
            "name" => $this->member->name,
            "cnic" => $this->member->passport,
            "phone_1" => $this->member->mobile,
            "phone_2" => $this->alt_phone_number,
            "address" => $this->member->adress,
            "membership_type" => $this->membership_type,
            "membership_number" => $this->member?->membership_number ?? "N/A",
            "installment_months" => $this->installment_months,
            "file_number" => $this->file_number,
            "form_fee" => $this->form_fee,
            "membership" => $this->member?->membership?->membership ?? "",
        ];
    }
}
