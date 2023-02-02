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
     public function followers()
     {
         return $this->belongsToMany(User::class,"followers","followed_id","following_id");
     }
     
     public function follows()
     {
         return $this->belongsToMany(User::class,"followers","following_id","followed_id");
     }
    //  フォロー機能
     public function follow($user_id)
     {
         return $this->follows()->attach($user_id);
     }
     
    //  フォロー解除機能
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }
    // フォロー状態の正否をチェック
    public function isFollowing($user_id)
    {
        return(boolean)$this->follows()->where("followed_id",$user_id)->first(["id"]);
    }
    
    public function isFollowed($user_id)
    {
        return(boolean)$this->followers()->where("following_id",$user_id)->first(["id"]);
    }
}
