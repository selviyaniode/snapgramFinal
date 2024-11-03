<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    protected $primaryKey='albumID';
    protected $fillable=[
    'namaAlbum',
    'deskripsi',
    'tanggalDibuat',
    'userID'];

    public function user() {
        return $this->belongsTo(User::class, 'userID');
    }
    
    public function photos() {
        return $this->hasMany(photo::class, 'albumID');
    }
}
