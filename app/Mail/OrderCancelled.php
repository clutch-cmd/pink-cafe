<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelled extends Mailable
{
    use Queueable, SerializesModels;

    public $comanda;

    public function __construct($comanda)
    {
        $this->comanda = $comanda;
    }

    public function build()
    {
        $this->comanda->load('produse');

        return $this->subject('Comanda ta la Pink Cafe a fost anulată')
                    ->view('emails.order_cancelled')
                    ->with([
                        'comanda' => $this->comanda,
                    ]);
    }
}