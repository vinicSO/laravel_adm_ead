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
        $replySupport->admin_id = 'e8f43f0d-f178-41d3-973b-ba16a18ed515'; // Temporário
        $replySupport->id = Str::uuid();
    }

}
