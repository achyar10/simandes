<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rt()
    {
        return $this->belongsTo(MasterRt::class);
    }

    public function family()
    {
        return $this->belongsTo(FamilyCard::class);
    }
}
