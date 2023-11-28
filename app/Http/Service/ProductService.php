<?php

namespace App\Http\Service;

use App\Models\Product;
use App\Models\User;
use App\Notifications\ProductNotification;
use Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redis;


class ProductService extends CommonService
{
    public function getList(): Collection|bool
    {
        $list = collect(json_decode(Redis::get('products')));
        if (!count($list ?? [])) {
            $list = false;
        }
        return $list;
    }

    public function show($id): Model
    {
        return Product::with(['images'])->find($id);
    }

    public function store($request): Product|int
    {
        try {
            $product = $this->DataStore($request);
            $res = $product;
            if (request()->hasFile('file') && $product->id) {
                $file = $request->file('file');
                $this->FileUpload($file, Product::class, $product->id, 'product');
            }
            $productData = [
                'name' => $request->name,
                'body' => 'stored your product.',
                'thanks' => 'Thank you',
                'product_id' => 007
            ];
            $user = Auth::user();
            $user->notify(new ProductNotification($productData));
        } catch (Exception $exception) {
            $res = (int)$exception->getCode();
        }
        return $res;
    }

    public function update($id, $request): Product|int
    {

//        try {
        $res = $this->DataStore($request, $id);

        if (request()->hasFile('file')) {
            $this->FileUpdate($request->file('file'), Product::class, $res->id, 'product');
        }
//        } catch (Exception $exception) {
//            $res = (int)$exception->getCode();
//        }
        return $res;
    }

    private function DataStore($request, $id = null): Product
    {
        $product = Product::find($id);

        if (!$product) {
            $product = new Product();
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();
        return $product;
    }


}
