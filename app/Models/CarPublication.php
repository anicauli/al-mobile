<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CarPublication extends Model
{
    public function publication(): MorphOne
    {
        return $this->morphOne(Publication::class, 'publishable');
    }
}
