<?php

namespace App\Services;

use App\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function search($search): LengthAwarePaginator
    {
        return Product::query()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhereHas('provider', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%$search%");
                    })
                    ->orWhereHas('productStock', function ($query) use ($search) {
                        $query->where('sale_price', 'LIKE', "%$search%")
                            ->orWhere('quantity', 'LIKE', "%$search%")
                            ->orWhere('total', 'LIKE', "%$search%");
                    });
            })
            ->paginate(10);
    }

    public function searchProviderProducts($search, $providerId): LengthAwarePaginator
    {
        return Product::query()
        ->where(function ($query) use ($search, $providerId) {
            $query->when($providerId, function ($query, $providerId) {
                $query->whereHas('provider', function ($query) use ($providerId) {
                    $query->where('id', '=', $providerId);
                });
            })
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhereHas('provider', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                    ->orWhereHas('productStock', function ($query) use ($search) {
                        $query->where('sale_price', 'LIKE', "%$search%")
                        ->orWhere('quantity', 'LIKE', "%$search%")
                        ->orWhere('total', 'LIKE', "%$search%");
                    });
            });
        })
            ->paginate(10);
    }
}

