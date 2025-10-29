<?php

namespace App\Services\Publication;

use App\Enums\PublicationStatus;
use App\Models\CarPublication;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PublicationCreateService
{
    public function create(User $user, string $title, string $publicationTypeClass): Publication
    {
        return DB::transaction(function () use ($user, $title, $publicationTypeClass) {
            $publicationTypeInstance = [
                CarPublication::class => fn() => new CarPublication(),
            ][$publicationTypeClass]();

            $publicationTypeInstance->save();
            return $publicationTypeInstance->publication()->create([
                'title' => $title,
                'user_id' => $user->id,
                'status' => PublicationStatus::DRAFT,
            ])->fresh();
        });
    }
}
