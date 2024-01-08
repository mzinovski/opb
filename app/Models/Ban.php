<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;

    public function user() {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function banned_by() {
    	return $this->belongsTo(User::class, 'banned_by_user_id', 'id');
    }
}
