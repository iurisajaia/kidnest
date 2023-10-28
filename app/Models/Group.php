<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kindergarten(): BelongsTo {
        return $this->belongsTo(User::class, 'kindergarten_id');
    }

    public function age(): BelongsTo {
        return $this->belongsTo(KidAge::class, 'age_id');
    }

    public function staff(): HasMany {
        return $this->hasMany(Staff::class, 'group_id');
    }

    public function kids(): HasMany {
        return $this->hasMany(Kid::class, 'group_id');
    }

}
