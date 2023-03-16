<?php

namespace App\Listeners;

use App\Events\SupportRepliedEvent;
use App\Mail\SendSupportEmailReplied as MailSendSupportEmailReplied;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSupportEmailReplied
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SupportRepliedEvent  $event
     * @return void
     */
    public function handle(SupportRepliedEvent $event)
    {
        $replySupport = $event->getReplySupport();

        $support = $replySupport->support;
        $user = $support->user;

        Mail::to($user->email)->send(new MailSendSupportEmailReplied($replySupport));
    }
}
