<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    //  id
        protected $fillable = ['facility_name', 'corporation', 'delete_at'];
    
        protected $guarded = ['created_at', 'updated_at'];
    use HasFactory;

    // 1つの園に複数のユーザーつくからhasMany
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
