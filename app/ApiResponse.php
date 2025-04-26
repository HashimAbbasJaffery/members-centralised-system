<?php

namespace App;

class ApiResponse
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function success($message, $data = []) {
        return [
            "status" => 200,
            "message" => $message,
            "data" => $data
        ];
    }
    public function error($status, $message) {   
        return [
            "status" => $status,
            "message" => $message
        ];
    }
}
