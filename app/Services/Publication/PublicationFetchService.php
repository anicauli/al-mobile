<?php

namespace App\Services\Publication;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PublicationFetchService
{
    public function fetch(?User $user = null): Builder
    {
        $query = Publication::query();
        if ($user) {
            $query->where('user_id', $user->id);
        }

        return $query;
    }
}
