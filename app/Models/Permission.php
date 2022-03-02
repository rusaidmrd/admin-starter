<?php

namespace App\Models;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getUpdatedAtAttribute($value) {
        return Carbon::parse($value)->toFormattedDateString();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
}
