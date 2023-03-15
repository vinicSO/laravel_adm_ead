<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'support_id',
        'description'
    ];

    protected $table = 'reply_support';

    public $incrementing = false;

    public function user () 
    {
        return $this->belongsTo(User::class);
    }

}
