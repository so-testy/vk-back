<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Activity
 * @package App\Models
 * @property int $id
 * @property int $user_id
 * @property int $exercise_id
 * @property DateTimeInterface $created_at
 * @property DateTimeInterface $updated_at
 */
class Activity extends Model
{
    protected $fillable = ['user_id', 'exercise_id'];
    protected $table = 'activities';

    public function exercise(): BelongsTo
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function create(User $user, Exercise $exercises)
    {
        $activity = new self;
        $activity->user_id = $user->id;
        $activity->exercise_id = $exercises->id;
        $activity->save();
    }
}
