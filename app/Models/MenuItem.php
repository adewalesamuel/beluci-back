<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory, SoftDeletes;
            
	public function menu_item()
	{
		return $this->belongsTo(MenuItem::class); 
	}
	public function menu()
	{
		return $this->belongsTo(Menu::class); 
	}
}