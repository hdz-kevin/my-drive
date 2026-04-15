<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HasCreatorAndUpdater
{
    /**
     * Set created_by and updated_by when the model is created or updated
     */
    protected static function bootHasCreatorAndUpdater(): void
    {
        static::creating(function ($model) {
            $model->created_by = $model->created_by ?? Auth::id();
            $model->updated_by = $model->updated_by ?? Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = $model->updated_by ?? Auth::id();
        });
    }
}
