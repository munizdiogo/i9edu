<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'label', 'collection'];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}