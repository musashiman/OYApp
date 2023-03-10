<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Diary;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
    
    /**
     * Relationships
     */
    public function followings()
    {
        return $this->belongsToMany(User::class,"followings","following_user_id","user_id")->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class,"followings","user_id","following_user_id")->withTimestamps();
    }
    
    
    public function follow(User $user)
    {
        $this->followings()->attach($user->id);
    }
    
    public function unfollow(User $user)
    {
        $this->followings()->detach($user->id);
    }
    
    public function isFollowing(User $user)
    {
        return $this->followings()->where("following_user_id",$user->id)->exists();
    }
}
