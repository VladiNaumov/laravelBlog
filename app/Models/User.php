<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'timezone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Связь модели Auth с моделью Post, позволяет получить все
     * посты пользователя
     */
    public function posts() {
        return $this->hasMany(Post::class);
    }

    /**
     * Связь модели Auth с моделью Comment, позволяет получить все
     * комментарии пользователя
     */
    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function getRandomEditor() {
        $users = self::inRandomOrder()->get();
        foreach ($users as $user) {
            if ($user->hasPermAnyWay('publish-post')) {
                return $user;
            }
        }
    }
}
