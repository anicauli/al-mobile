<?php

namespace App\Services\Publication;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PublicationFetchService
{
    public function fetch(string $model, ?User $user = null): Builder
    {
        /**
         * @var string $table
         * @var Builder $query
         */
        $table = call_user_func($model . '::query')->getModel()->getTable();
        $query = call_user_func($model . '::query')->select($table . '.*');

        if ($user) {
            $query->whereHas('publication', function (Builder $query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        return $query;
    }
}
