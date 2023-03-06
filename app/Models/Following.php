<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Following extends Model
{
    use HasFactory;
    
    protected $table = "followings";
    protected $fillable = [
            "user_id",
            "following_user_id",
        ];
    
    // RelationShip;
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
    
    
}
