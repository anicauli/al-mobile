<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CarPublication extends Model
{
    use HasUuid;

    protected $guarded = ['id'];

    public function publication(): MorphOne
    {
        return $this->morphOne(Publication::class, 'publishable');
    }
}
