<?php

namespace App\Services;

use App\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientService
{
    public function search($search): LengthAwarePaginator
    {
        $search = strip_tags(trim($search));

        return Client::where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('telephone', 'LIKE', "%$search%")
            ->orWhere('address', 'LIKE', "%$search%")->orderByDesc('id')->paginate(10);
    }
}
