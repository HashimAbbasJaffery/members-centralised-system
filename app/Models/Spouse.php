<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    protected $table = "spouses";
    protected $guarded = [ "id", "created_at", "updated_at" ];

    public function member() {
        return $this->belongsTo(Member::class);
    }
}
