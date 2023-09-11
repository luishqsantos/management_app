<?php

namespace App\Services;

use App\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function search($search): LengthAwarePaginator
    {
        $search = strip_tags(trim($search));

        return User::where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->orWhere('created_at', 'LIKE', "%$search%")
            ->orWhere('updated_at', 'LIKE', "%$search%")->orderByDesc('id')->paginate(10);
    }
}
