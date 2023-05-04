<?php

namespace App\Services;

use App\Order;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService
{
    public function search($search): LengthAwarePaginator
    {
        $search = strip_tags(trim($search));
        
        return Order::query()
            ->where(function ($query) use ($search) {
                $query->whereHas('client', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%$search%");
                })
                    ->orWhere('id', 'LIKE', "%$search%");
            })
            ->orderByDesc('id')->paginate(10);
    }
}
