<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    protected $guarded = [];

    public function hasilPanens()
    {
        return $this->hasMany(HasilPanen::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
