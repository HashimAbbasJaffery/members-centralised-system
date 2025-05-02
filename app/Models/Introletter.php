<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Introletter extends Model
{
    protected $table = "introletter";
    protected $guarded = [ "id", "created_at", "updated_at" ];

    public function member() {
        return $this->belongsTo(Member::class);
    }
    public function scopeLikeWhereOnAllColumns($query, $keyword) {
        $columns = Schema::getColumnListing('introletter');

        $query->where(function($query) use($columns, $keyword) {
            foreach($columns as $column) {
                $query->orWhere($column, "LIKE", "%$keyword%");
            }
        });

        return $query;
    }
}
