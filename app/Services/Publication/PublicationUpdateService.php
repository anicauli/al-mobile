<?php

namespace App\Services\Publication;

use App\Models\CarPublication;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PublicationUpdateService
{
    public function update(Publication $publication, array $data): Publication
    {
        /**
         * @var Model $publishable
         */
        $publishable = $publication->publishable()->first();
        $publishable->fill($data);
        $publishable->save();

        return $publication->fresh();
    }
}
