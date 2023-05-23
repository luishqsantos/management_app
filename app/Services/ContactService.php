<?php

namespace App\Services;

use App\SiteContact;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactService
{
    public function search($search, $status): LengthAwarePaginator
    {
        $search = strip_tags(trim($search));

        return SiteContact::with(['reason'])
            ->where('status', $status)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('telephone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('message', 'like', '%' . $search . '%')
                    ->orWhereHas('reason', function ($query) use ($search) {
                        $query->where('reason', 'like', '%' . $search . '%');
                    });
            })
            ->orderByDesc('id')
            ->paginate(5);
    }

    public function getQuantityMessages()
    {
        $quatityMessages = (object)[
            'read'   => SiteContact::where('status', 0)->count(),
            'unread' => SiteContact::where('status', 1)->count()
        ];

        return $quatityMessages;
    }
}
