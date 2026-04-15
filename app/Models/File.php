<?php

namespace App\Models;

use App\Traits\HasCreatorAndUpdater;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

#[Fillable(['name', 'path', 'is_folder', 'mime', 'size', 'created_by', 'updated_by'])]
class File extends Model
{
    use HasCreatorAndUpdater, NodeTrait, SoftDeletes;

    /**
     * Override NodeTrait's usesSoftDelete() to avoid a circular boot issue.
     * NodeTrait's default implementation calls `new static` during boot,
     * which triggers bootIfNotBooted() again and throws a LogicException
     */
    public static function usesSoftDelete()
    {
        return true;
    }
}
