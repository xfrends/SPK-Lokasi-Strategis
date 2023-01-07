<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alternative extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function criteria()
    {
        // return $this->belongsToMany(Criteria::class);
        return $this->belongsToMany(Criteria::class, 'criteria_alternatives', 'criteria_id', 'alternative_id');
    }

    public function values() {
        return $this->hasMany(CriteriaAlternative::class);
    }
}
