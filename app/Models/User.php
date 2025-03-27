<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use RedJasmine\Support\Contracts\UserInterface;

class User extends Authenticatable implements HasName,UserInterface,FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    public function canAccessPanel(Panel $panel) : bool
    {
        return  true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function getFilamentName() : string
    {
       return  $this->username;
    }

    public function getType() : string
    {
        return 'user';
    }

    public function getID() : string
    {
        return $this->getKey();
    }

    public function getNickname() : ?string
    {
        return $this->nickname;
    }

    public function getAvatar() : ?string
    {
        return  $this->avatar;
    }


}
