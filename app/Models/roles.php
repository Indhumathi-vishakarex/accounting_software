<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{

    public function staffMembers()
    {
        return $this->hasMany(staff_members::class, 'role_id', 'id');
    }
}
