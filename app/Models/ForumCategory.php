<?php

namespace App\Models;

use App\Casts\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumCategory extends Model
{
    use HasFactory, SoftDeletes;

	public function forum_category()
	{
		return $this->belongsTo(ForumCategory::class);
	}

    /**
     * Get all of the forums for the ForumCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'slug' => Slugify::class,
        ];
    }
}
