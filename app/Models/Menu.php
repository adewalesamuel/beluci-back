<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the menu_items for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menu_items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
