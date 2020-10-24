<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoiceControlRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function voiceControl(int $vkId, VoiceControlRequest $request)
    {
        $user = User::where('vk_id', $vkId)->first();

        if (empty($user)) {
            return response()->json(
                [
                    'message' => 'User not found',
                ]
            );
        }

        $user->voice_control = $request->voiceControl;
        $user->save();

        return response()->json(
            [
                'message' => 'Voice control successfully install',
            ]
        );
    }
    public function __invoke(int $vkId)
    {
        $user = User::where('vk_id', $vkId)->first();

        if (empty($user)) {
            User::create(
                [
                    'vk_id' => $vkId,
                ]
            );
            return response()->json(
                [
                    'message' => 'Successfully created user!'
                ],
                201
            );
        }

        return response()->json(
            [
                $user,
            ],
            200
        );
    }
}
