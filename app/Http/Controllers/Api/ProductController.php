<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ListNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Service\ProductService;
use App\Notifications\ProductNotification;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{

    public function __construct(
        protected ProductService $productService
    )
    {
        $this->middleware('permission:create-product|edit-product|delete-product', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);
    }

    /**
     * @throws ListNotFoundException
     */
    public function index(): JsonResponse
    {

        $productList = $this->productService->getList();
        if (!$productList) {
            throw new  ListNotFoundException;
        }
        return $this->sendResponse($productList, "successful");
    }

    public function store(StoreProductRequest $storeProductRequest): JsonResponse
    {
        return $this->sendResponse($this->productService->store($storeProductRequest), "successful");
    }

    public function update($id, UpdateProductRequest $request): JsonResponse
    {
        return $this->sendResponse($this->productService->update($id, $request), "successful");
    }

    public function show($id): JsonResponse
    {
        return $this->sendResponse($this->productService->show($id), "successful");
    }
}
