<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $level
 * @property string $level_string
 * @property bool $is_admin
 * @property bool $is_moderator
 * @property bool $is_author
 * @property bool $is_reader
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'level_string',
        'is_admin',
        'is_moderator',
        'is_author',
        'is_reader',
    ];

    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getLevelStringAttribute(): string
    {
        switch ($this->level) {
            case 1:
                return 'Administrator';
            case 2:
                return 'Moderator';
            case 3:
                return 'Author';
            case 4:
            default:
                return 'Reader';
        }
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->level == 1;
    }

    public function getIsModeratorAttribute(): bool
    {
        return $this->level == 2;
    }

    public function getIsAuthorAttribute(): bool
    {
        return $this->level == 3;
    }

    public function getIsReaderAttribute(): bool
    {
        return $this->level == 4;
    }
}
