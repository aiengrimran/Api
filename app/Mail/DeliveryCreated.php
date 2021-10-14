<?php

namespace App\Mail;

use App\Models\Delivery;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeliveryCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $delivery;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($delivery)
    {
        $this->delivery=$delivery;
    }
  



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->markdown('emails.delivery.created');
    }
}
