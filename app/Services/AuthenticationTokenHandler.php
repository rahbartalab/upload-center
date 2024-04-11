<?php

namespace App\Services;

use Jenssegers\Agent\Agent;

class AuthenticationTokenHandler
{

    public function generateToken($user)
    {
        // auth-{user_id}-{mobile}
        // auth-{user_id}-{desktop}

        $agent = new Agent();
        $device = $agent->isMobile() ? 'mobile' : 'desktop';
        $tokenName = "auth-{$user->id}-{$device}";
        $user->tokens()->where('name', $tokenName)->delete();
        return $user->createToken($tokenName)->plainTextToken;
    }
}
