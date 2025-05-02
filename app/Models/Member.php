<?php

namespace App\Models;

use App\Models\Membership;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Schema;

class Member extends Model
{
    protected $guarded = ["id", "created_at", "updated_at"];
    protected $with = [ "membership" ];
    public function recovery() {
        return $this->hasOne(Recovery::class);
    }
    public function introletter() {
        return $this->hasOne(Introletter::class);
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
    public function scopeFilter($query, array $filters) {

        // Looping through the relationships array and binding it with whereHas
        $query->where(function() use ($query, $filters) {
            if($filters["type"] === "member") {
                $query->where(function() use ($query, $filters) {
                    foreach($filters["whereHasTable"] as $index => $relationship) {
                        if($index === 0) {
                            $query->whereHas($relationship);
                        } else {
                            $query->orWhereHas($relationship);
                        }
                    }
                });
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
    public function spouses() {
        return $this->hasMany(Spouse::class);
    }
    public function children() {
        return $this->hasMany(Child::class);
    }
}
