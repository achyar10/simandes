<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rt()
    {
        return $this->belongsTo(MasterRt::class);
    }

    public function citizens()
    {
        return $this->hasMany(Citizen::class);
    }
}
