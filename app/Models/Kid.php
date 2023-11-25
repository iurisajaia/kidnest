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

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function kindergarten(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kindergarten_id');
    }

    public function summaryForToday()
    {
        return $this->summaries()->whereDate('created_at', Carbon::today())->first();
    }

    public function getParent(){
        return $this->parents()->first();
    }


}
