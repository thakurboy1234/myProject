<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function price(Category $category, Request $request){
        $products = $this->filterByPrice(
            Product::query(),
            [$request->min_price ?: 0, $request->max_price ?: 0]
        );

        return ...;
    }

    private function filterByPrice($query, $range){

        if (!$range[0] && !$range[1]) return $query->all();

        if ($range[0] && !$range[1]) {
            return $query
                ->where('price', '>=', $range[0])
                ->orWhere('sale_price', '>=', $range[0])
                ->all();
        }

        if (!$range[0] && $range[1]) {
            return $query
                ->where('price', '<=', $range[1])
                ->orWhere('sale_price', '<=', $range[1])
                ->all();
        }

        return $query
            ->whereBetween('price', $range)
            ->orWhereBwtween('sale_price', $range)
            ->all();
    }



}
