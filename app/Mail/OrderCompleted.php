<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $comanda;

    // Aici primim comanda în email
    public function __construct($comanda)
    {
        $this->comanda = $comanda;
    }

    public function build()
{
    $this->comanda->load('produse');

    return $this->subject('Comanda ta a fost livrată!')
                ->view('emails.order_complited')
                ->with([
                    'comanda' => $this->comanda,
                ]);
}
}