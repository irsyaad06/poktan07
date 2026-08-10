<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPanen extends Model
{
    protected $guarded = [];

    public function petani()
    {
        return $this->belongsTo(Petani::class);
    }
}
