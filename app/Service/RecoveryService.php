<?php

namespace App\Service;

use App\Models\Recovery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RecoveryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function recoveryExists(Recovery $recovery) {
        if(!$recovery->exists()) {
            throw new ModelNotFoundException('Recovery Not Found');
        }
    }

    public function updateRecovery(Recovery $recovery, array $validatedData) {
        $recovery->update($validatedData);
    }
    public function delete(Recovery $recovery) {
        $recovery->delete();
    }
    public function getRecoveries($keyword = "", $per_page = "10") {
        $recoveries = Recovery::
                likeWhereOnAllColumns($keyword)
                ->with("member")
                ->orderBy("id", "desc")
                ->paginate($per_page)
                ->onEachSide(1)
                ->withQueryString();
        
        return $recoveries->toResourceCollection();
    }
}
