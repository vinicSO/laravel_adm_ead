<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'available',
    ];

    public $incrementing = false;

    public function modules () {
        return $this->hasMany(Module::class);
    }

    protected $casts = [
        'id' => 'string'
    ];
}
