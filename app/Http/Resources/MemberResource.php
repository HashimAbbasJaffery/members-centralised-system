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
        if($request->type === "member") {
            return [
                "id" => $this->id,
                "recovery_id" => $this->recovery?->id,
                "name" => $this->name,
                "gender" => $this->gender,
                "dob" => $this->dob,
                "passport" => $this->passport,
                "adress" => $this->adress,
                "email" => $this->email,
                "is_partial_paid" => $this->recovery()->exists()
            ];
        }

        return [
            "id" => $this->id,
            "recovery_id" => $this->recovery?->id,
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
