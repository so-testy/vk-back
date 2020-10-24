<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Course
 * @package App\Models
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property int $duration
 * @property DateTimeInterface $start_date
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 */
class Course extends Model
{
    protected $fillable = ['name', 'description', 'start_date'];
    protected $table = 'courses';

    const PROGRESS_NONE = "PROGRESS_NONE";
    const PROGRESS_ENDING = "PROGRESS_ENDING";
    const IS_BLOCKED_TRUE = 1;
    const IS_BLOCKED_FALSE = 0;

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
