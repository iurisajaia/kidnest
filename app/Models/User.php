<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRoleEnum;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements FilamentUser , HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->email !== '';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'user_data' => 'array'
    ];


    // Kindergarten relations
    public function branches(): HasMany {
        return $this->hasMany(Branch::class, 'kindergarten_id');
    }

    public function groups(): HasMany {
        return $this->hasMany(Group::class, 'kindergarten_id');
    }

    public function staff(): HasMany {
        return $this->hasMany(Staff::class, 'kindergarten_id');
    }


    // parent relations
    public function kids(): BelongsToMany{
        return $this->belongsToMany(Kid::class, 'parent_kid', 'parent_id', 'kid_id');
    }


    // general relations
    public function role(): BelongsTo{
        return $this->belongsTo(Role::class, 'user_role_id');
    }


    public function profileUrl(): string
    {
        $nameSlug = Str::slug($this->name);
        return url('/') . '/register/' . $this->id . '/' .$nameSlug;
    }


    public function isKindergarten(): bool
    {
        return $this->user_role_id === UserRoleEnum::KINDERGARTEN['id'];
    }

    public function isParent(): bool
    {
        return $this->user_role_id === UserRoleEnum::PARENT['id'];
    }

    public function isEducator(): bool
    {
        return $this->user_role_id === UserRoleEnum::EDUCATOR['id'];
    }



}
