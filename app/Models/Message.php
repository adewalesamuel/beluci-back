<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;
            
	public function member()
	{
		return $this->belongsTo(Member::class); 
	}
	public function forum()
	{
		return $this->belongsTo(Forum::class); 
	}
}