<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $orderItem;

public function __construct($orderItem)
{
    $this->orderItem = $orderItem;
}

    public function build()
    {
        return $this->subject('Mise à jour de votre commande')
                    ->view('emails.order_status'); 
    }
}
