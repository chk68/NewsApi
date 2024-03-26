<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * Post
 *
 * @mixin Builder
 */
class Language extends Model
{
    protected $fillable = ['locale', 'prefix'];

    public function translations(): HasMany
    {
        return $this->hasMany(PostTranslation::class);
    }
}
