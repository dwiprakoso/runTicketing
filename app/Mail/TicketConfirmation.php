<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $paymentLink;

    public function __construct($order, $paymentLink)
    {
        $this->order = $order;
        $this->paymentLink = $paymentLink;
    }

    public function build()
    {
        return $this->subject('Konfirmasi Pemesanan Tiket')
                    ->view('emails.ticket_confirmation');
    }
}
