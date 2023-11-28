<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Service\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct(
        protected ArticleService $articleService
    )
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse($this->articleService->getList(), "successful");
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->sendResponse($this->articleService->store($request), "successful");
    }
}
