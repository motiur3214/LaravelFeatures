<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductLog;


class ProductObserver
{

    /**
     * Handle the Article "created" event.
     */
    public function created(Product $product): void
    {
        if (isset($product->id)) {
            $log = new ProductLog();
            $log->user_id = auth()->id();
            $log->product_id = $product->id;
            $log->save();
        }
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
