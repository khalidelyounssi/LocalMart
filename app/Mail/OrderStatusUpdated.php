<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $order; 

public function __construct( $order) 
{
    $this->order = $order;
}

    public function build()
    {
        return $this->subject('Mise à jour de votre commande')
                    ->view('emails.order_status'); 
    }
}
