<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kindergarten(): BelongsTo {
        return $this->belongsTo(User::class, 'kindergarten_id');
    }

}
