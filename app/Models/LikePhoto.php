<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model
{
    protected $table = 'likes';
    protected $primaryKey = 'likeID';
    protected $fillable = ['tanggalLike', 'fotoID', 'userID'];
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }
}
