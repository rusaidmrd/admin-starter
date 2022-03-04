<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


      // Role Accessors
      public function getCreatedAtAttribute($value)
      {
          return Carbon::parse($value)->toFormattedDateString();
      }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

}
