<?php

namespace App\Models;

use App\Casts\Slugify;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forum extends Model
{
    use HasFactory, SoftDeletes;

	public function member()
	{
		return $this->belongsTo(Member::class);
	}
	public function forum_category()
	{
		return $this->belongsTo(ForumCategory::class);
	}

    /**
     * Get all of the messages for the Forum
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
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
