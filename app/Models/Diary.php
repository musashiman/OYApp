<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Diary extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = [
        "body",
        "image_path",
        "date",
        ];
    

}

