<?php

namespace App\Mail;

use App\Models\OrderItem;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderSellerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    public function __construct(OrderItem $item)
    {
        $this->item = $item;
    }

    public function build()
    {
        return $this->subject('Nouvelle vente reçue !')
                    ->view('emails.seller_new_order');
    }
}