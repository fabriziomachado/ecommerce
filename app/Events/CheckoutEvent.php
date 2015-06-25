<?php namespace CodeCommerce\Events;

use CodeCommerce\Events\Event;

use Illuminate\Queue\SerializesModels;

class CheckoutEvent extends Event {

	use SerializesModels;

    public $user;
    public $order;

	public function __construct($user, $order)
	{
		$this->user = $user;
        $this->order = $order;
	}

}
