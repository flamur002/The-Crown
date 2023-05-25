<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    public $code;
    public $name;
    public $checkin;
    public $checkout;
    public $guests;
    public $type;
    public $price;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code,$name,$checkin,$checkout,$guests,$type,$price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->guests = $guests;
        $this->type = $type;
        $this->price = $price;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Booking Confirmation',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.confirm',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
