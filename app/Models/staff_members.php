<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class staff_members extends Model
{
    public function role()
{
    return $this->belongsTo(roles::class, 'role_id', 'id');
}

}
