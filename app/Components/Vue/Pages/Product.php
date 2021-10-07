<?php

namespace App\Components\Vue\Pages;

use App\Components\Vue\Page;
use App\Http\Resources\DeliveryResource;
use App\Http\Resources\ProductResource;
use App\Models\Delivery;

/**
 * Product Class.
 * @package App\Components\Vue\Pages
 */
class Product extends Page
{
    /**
     * Protected variable Element.
     * @var string
     */
    protected $element = 'pages_product';

    public function __construct($id = null, array $attrs = [], ...$params)
    {
        $attrs['products'] = ProductResource::collection(
            \App\Models\Product::all() //->filter(fn (\App\Models\Product $product) => $product->total_scrap)
        )->toArray(request());

        $attrs['deliveries'] = DeliveryResource::collection(Delivery::all())->toArray(request());

        parent::__construct($id, $attrs, $params);
    }
}
