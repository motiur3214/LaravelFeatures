<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Service\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    )
    {
    }

    public function show(): JsonResponse
    {
        return $this->sendResponse($this->userService->getDetails(), "success");
    }

}

