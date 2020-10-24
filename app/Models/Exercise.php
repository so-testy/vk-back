<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Exercise
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $duration
 * @property string $instructions
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 */
class Exercise extends Model
{
    protected $fillable = [];
    protected $table = 'exercises';

    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }
}
