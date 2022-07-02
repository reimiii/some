<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Moderator extends Authenticatable {

    use HasFactory, Notifiable, HasApiTokens;

    const PAGINATION_COUNT = 5;

    protected $guard = 'moderator';

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function countGuru()
    {
        return Guru::count();
    }

    public function countMod()
    {
        return Moderator::count();
    }

    public function countUser()
    {
        return User::count();
    }

    public function getAvatar()
    {
        $firstCharacter = $this->email[0];

        if ( is_numeric($firstCharacter) ) {
            $integerToUse = ord(strtolower($firstCharacter)) - 21;
        } else {
            $integerToUse = ord(strtolower($firstCharacter)) - 96;
        }

        // $randomInt = rand(1, 36);

        return 'https://www.gravatar.com/avatar/'
            . md5($this->email)
            . '?s=200'
            . '&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
            . $integerToUse
            . '.png';
    }


}
