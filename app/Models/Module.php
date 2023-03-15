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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string'
    ];

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function lessons () {
        return $this->hasMany(Lesson::class);
    }
}
