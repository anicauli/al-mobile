<?php

namespace App\Models;

use App\Enums\PublicationStatus;
use App\Traits\HasUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property PublicationStatus $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property User $user
 * @property Model $publishable
 * @property string $publishable_id
 * @property string $publishable_type
 */
class Publication extends Model
{
    use SoftDeletes, HasUuid;

    protected $fillable = [
        'user_id',
        'title',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => PublicationStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function publishable(): MorphTo
    {
        return $this->morphTo();
    }

    public function car(): BelongsTo
    {
        return $this->belongsTo(CarPublication::class, 'publishable_id', 'id')
            ->whereHas('publication', function ($query) {
                $query->where('publishable_type', CarPublication::class);
            });
    }
}
