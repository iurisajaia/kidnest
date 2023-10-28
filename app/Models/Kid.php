<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kid extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parents(): BelongsToMany{
        return $this->belongsToMany(User::class, 'parent_kid', 'kid_id', 'parent_id');
    }

    public function summaries(): HasMany
    {
        return $this->hasMany(Summary::class);
    }

    public function summaryForToday()
    {
        return $this->summaries()->whereDate('created_at', Carbon::today())->first();
    }
}
