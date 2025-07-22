<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RoleUser extends Model
{
    protected $table = 'role_user';
    protected $fillable = ['role_id', 'user_id'];


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function user()
    {
        return $this->belongsTo(Role::class, 'user_id');
    }
}