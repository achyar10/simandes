<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterRt extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rw()
    {
        return $this->belongsTo(MasterRw::class);
    }
}
