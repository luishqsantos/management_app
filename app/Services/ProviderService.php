<?php

namespace App\Services;

use App\Provider;
use Illuminate\Pagination\LengthAwarePaginator;

class ProviderService
{
    public function search($search): LengthAwarePaginator
    {
        return Provider::with(['products'])
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('site', 'like', '%' . $search . '%')
                    ->orWhere('uf', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhereHas('products', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                    });
            })
            ->paginate(5);
    }
}
