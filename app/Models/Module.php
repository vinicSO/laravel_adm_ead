<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, UuidTrait;

    protected $fillable = [
        'name',
        'course_id'
    ];

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function lessons () {
        return $this->hasMany(Lesson::class);
    }
}
