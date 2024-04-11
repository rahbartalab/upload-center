<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Agent\Agent;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function generateToken(): string
    {
        // auth-{user_id}-{mobile}
        // auth-{user_id}-{desktop}

        $agent = new Agent();
        $device = $agent->isMobile() ? 'mobile' : 'desktop';
        $tokenName = "auth-{$this->id}-{$device}";
        $this->tokens()->where('name', $tokenName)->delete();
        return $this->createToken($tokenName)->plainTextToken;
    }
}
