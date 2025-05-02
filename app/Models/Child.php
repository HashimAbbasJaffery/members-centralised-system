<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $guarded = [ "id", "created_at", "updated_at" ];
    public function parent() {
        return $this->belongsTo(Member::class, "member_id", "id");
    }
}
