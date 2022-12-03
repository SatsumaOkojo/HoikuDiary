<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'prposals';
// user id
    protected $fillable = ['event_name', 'schedule', 'image']

    protected $guarded = ['created_at', 'updated_at']
    use HasFactory;
}
