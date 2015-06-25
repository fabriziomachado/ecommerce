<?php namespace CodeCommerce\Handlers\Events;

use CodeCommerce\Events\CheckoutEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
{


    public function __construct()
    {
        //
    }

    public function handle(CheckoutEvent $event)
    {
        $user = $event->user;

        Mail::send('emails.order', ['user' => $user, 'order' => $event->order], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Order suscess.');
        });
    }

}
