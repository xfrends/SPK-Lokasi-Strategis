<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Criteria extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function alternative()
    {
        return $this->belongsToMany(Alternative::class);
    }
}
