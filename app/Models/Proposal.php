<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';
// user id
    protected $fillable = ['user_id', 'event_name', 'schedule', 'proposal_image_path', 'delete_at'];

    protected $guarded = ['created_at', 'updated_at'];
    use HasFactory;

    
public function user()
{
    return $this->hasOne(User::class);
}
}
