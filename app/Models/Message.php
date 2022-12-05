<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    //  園id  ユーザーid
        protected $fillable = ['facility_id', 'user_id', 'message', 'delete_at'];
    
        protected $guarded = ['created_at', 'updated_at'];
    use HasFactory;
}
