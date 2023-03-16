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
        $replySupport->admin_id = '7e83ff46-48b6-4ae7-a275-79ce7d67ecf3'; // Temporário
        $replySupport->id = Str::uuid();
    }

}
