<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    //  役職id　
        protected $fillable = ['position_name', 'author_id']
    
        protected $guarded = ['created_at', 'updated_at']
    use HasFactory;
}
