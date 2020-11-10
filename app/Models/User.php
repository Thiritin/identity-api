<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jamesh\Uuid\HasUuid;


/**
 * @property string $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $avatar
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, HasUuid, Notifiable, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];


    /**
     * @return BelongsToMany
     */
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    /**
     * @return HasMany
     */
    public function twoFactors()
    {
        return $this->hasMany(TwoFactor::class);
    }
}
