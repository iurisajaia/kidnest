<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment(): BelongsTo{
        return $this->belongsTo(Payment::class);
    }

    public function parent(): BelongsTo{
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function kindergarten(): BelongsTo{
        return $this->belongsTo(User::class, 'kindergarten_id');
    }
}
