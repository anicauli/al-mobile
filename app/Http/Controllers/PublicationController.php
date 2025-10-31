<?php

namespace App\Http\Controllers;

use App\Http\Requests\Publication\PublicationStoreRequest;
use App\Http\Requests\Publication\PublicationUpdateRequest;
use App\Models\Publication;
use App\Models\User;
use App\Services\Publication\PublicationCreateService;
use App\Services\Publication\PublicationFetchService;
use App\Services\Publication\PublicationUpdateService;
use App\Utils\Table\Table;

class PublicationController extends Controller
{
    public function list(PublicationFetchService $publicationFetchService): \Illuminate\Http\JsonResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->user();

        $data = Table::basicCreate($publicationFetchService->fetch($user))
            ->paginateTable();

        return response()->json($data, 200);
    }

    public function count(PublicationFetchService $publicationFetchService): \Illuminate\Http\JsonResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->user();

        $data = Table::basicCreate($publicationFetchService->fetch($user))
            ->count();

        return response()->json($data, 200);
    }
    public function store(
        PublicationCreateService $publicationCreateService,
        PublicationStoreRequest $publicationStoreRequest,
    ): \Illuminate\Http\JsonResponse
    {
        /**
         * @var User $user
         */
        $user = auth()->user();

        $publication = $publicationCreateService->create(
            $user,
            $publicationStoreRequest->title,
            $publicationStoreRequest->publication_type,
        );

        return response()->json($publication, 201);
    }

    public function update(
        PublicationUpdateService $publicationUpdateService,
        PublicationUpdateRequest $publicationUpdateRequest,
        Publication $publication
    ): \Illuminate\Http\JsonResponse
    {
        $publication = $publicationUpdateService->update($publication, $publicationUpdateRequest->validated());

        return response()->json($publication, 200);
    }
}
