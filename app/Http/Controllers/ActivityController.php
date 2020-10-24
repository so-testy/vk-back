<?php

namespace App\Http\Controllers;


use App\Http\Requests\SaveActivityRequest;
use App\Models\Activity;
use App\Models\Exercise;
use App\Models\User;
use Exception;

class ActivityController extends Controller
{
    public function activity(?int $vkId)
    {
        $user = User::where('vk_id', $vkId)->first();

        if (empty($user)) {
            return response()->json(
                [
                    'message' => 'User not found',
                ]
            );
        }

        return response()->json($user->activities);
    }

    public function saveActivity(int $vkId, SaveActivityRequest $request)
    {
        try {
            $user = User::where('vk_id', $vkId)->first();
            $exercises = Exercise::find(request(['exerciseId']))->first();
            if (empty($user) || empty($exercises)) {
                throw new Exception("User or exercise not found");
            }
            $activity = Activity::create($user, $exercises);
            return response()->json(
                [
                    'message' => 'Successfully created user activity'
                ],
                200
            );
        } catch (Exception $exception) {
            return response()->json(
                [
                    'vkId' => $vkId,
                    'exerciseId' => $request->exerciseId,
                    'message' => 'An error occurred while saving user activity',
                    'exception' => $exception->getMessage(),
                ]
            );
        }
    }
}
