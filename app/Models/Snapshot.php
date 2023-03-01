<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snapshot extends Model
{
    use HasFactory;
    
    protected $fillable = [
            "user_id",
            "diary_id",
            "comment",
            "image_path",
        ];
    
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
    
    public function diary()
    {
        return $this->belongsTo(Diary::class,"diary_id","id");
    }
    
}
