<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


/**
 * Class User
 * @package App\Models
 * @property int $id
 * @property int $vk_id
 * @property int $voice_control
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'vk_id',
        'voice_control',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    public function getActivity()
    {
        return "12";
    }
}
