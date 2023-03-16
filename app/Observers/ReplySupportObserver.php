<?php

namespace App\Observers;

use App\Models\ReplySupport;
use Illuminate\Support\Str;

class ReplySupportObserver
{
    /**
     * Handle the ReplySupport "creating" event.
     *
     * @param  \App\Models\ReplySupport  $replySupport
     * @return void
     */
    public function creating(ReplySupport $replySupport)
    {
        $replySupport->admin_id = '2373b7f3-54a4-41cf-9400-4b502f0d633f'; // Temporário
        $replySupport->id = Str::uuid();
    }

}
