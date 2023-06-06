<?php

namespace App\Services;

use App\SiteContact;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactService
{
    /**
     * Return collection with specified search and params
     * @param  string $search Params of search
     * @param  bool $status Status of message (read or unread)
     * @param  bool $replied Return replied messages
     * @return LengthAwarePaginator
     */
    public function search($search, $status = 1, $replied = 0): LengthAwarePaginator
    {
        $search = strip_tags(trim($search));

        return SiteContact::with(['reason','reply'])
            ->where('status', $status)
            ->where(function ($query) use ($search, $replied) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('telephone', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('message', 'like', '%' . $search . '%')
                    ->orWhereHas('reason', function ($query) use ($search) {
                        $query->where('reason', 'like', '%' . $search . '%');
                    });

                    if ($replied) {
                        $query->orWhereHas('reply', function ($query) use ($search) {
                            $query->where('message', 'like', '%' . $search . '%');
                        });
                    }
            })
            ->when($replied, function ($query) {
                $query->whereHas('reply');
            })
            ->when(!$replied, function ($query) {
                $query->whereDoesntHave('reply');
            })
            ->orderByDesc('id')
            ->paginate(5);
    }

    /**
     * Get the number of messages per class
     *
     * @return object
     */
    public function getQuantityMessages()
    {
        $quatityMessages = (object)[
            'read'    => SiteContact::where('status', 0)->count(),
            'unread'  => SiteContact::where('status', 1)->count(),
            'replied' => SiteContact::whereHas('reply')->count()
        ];

        return $quatityMessages;
    }
}
