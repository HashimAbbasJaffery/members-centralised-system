<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecoveryRequest;
use App\Models\Member;
use App\Models\Recovery;
use App\Service\RecoveryService;
use Illuminate\Http\Request;

class RecoveryController extends Controller
{
    public function __construct(
        protected RecoveryService $service,
        protected ApiResponse $apiResponse
    ) {}
    public function index() {
        return $this->service->getRecoveries(request()->keyword, request()->per_page ?? 10);
    }

    public function store(RecoveryRequest $request) {
        Recovery::create([ ...$request->validated(), "member_id" => request()->id ]);
        return $this->apiResponse->success("Data has been created!");
    }
    public function update(RecoveryRequest $request, Recovery $recovery) {
        $this->service->recoveryExists($recovery);
        $this->service->updateRecovery($recovery, $request->validated());
        return $this->apiResponse->success("The data has been updated!");
    }
    public function destroy(Recovery $recovery) {
        $this->service->recoveryExists(($recovery));
        
        $this->service->delete($recovery);

        return $this->apiResponse->success("This member's recovery is deleted");
    }
}
