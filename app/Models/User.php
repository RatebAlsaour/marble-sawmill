<?php

namespace App\Models;

use App\Modules\EnumManager\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'resource_type',
        'resource_id',
        'is_verified',
        'verified_at',
        'verification_code',
        'is_blocked',
        'blocked_at',
        'type',
    ];

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
        'created_at' => 'datetime:Y-m-d',
    ];

    public function resource(): morphTo
    {
        return $this->morphTo('resource');
    }

    public function supplier(): hasOne
    {
        return $this->hasOne(Supplier::class);
    }

    public function client(): hasOne
    {
        return $this->hasOne(Client::class);
    }

    public function scopeSupplier($query)
    {
        return $query->whereType(UserTypeEnum::Supplier);
    }

    public function scopeClient($query)
    {
        return $query->whereType(UserTypeEnum::Client);
    }

    public function scopeManagerial($query)
    {
        return $query->whereType(UserTypeEnum::MANAGERIAL);
    }
}
