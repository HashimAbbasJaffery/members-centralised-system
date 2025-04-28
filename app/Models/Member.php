<?php

namespace App\Models;

use App\Http\Controllers\Membership;
use Illuminate\Database\Eloquent\Model;
use Schema;

class Member extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];
    public function recovery() {
        return $this->hasOne(Recovery::class);
    }

    public function scopeLikeWhereOnAllColumns($query, $keyword) {
        $columns = Schema::getColumnListing('members');

        $query->where(function($query) use($columns, $keyword) {
            foreach($columns as $column) {
                $query->orWhere($column, "LIKE", "%$keyword%");
            }
        });

        return $query;
    }
    public function toggleHighlight() {
        $this->highlighted = $this->highlighted === "highlighted" ? "" : "highlighted";
        $this->save();
    }
    public function membership() {
        return $this->belongsTo(Membership::class);
    }
}
