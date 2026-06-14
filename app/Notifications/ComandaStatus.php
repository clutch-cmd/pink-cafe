<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ComandaStatus extends Notification
{
    use Queueable;
    protected string $mesaj;

    public function __construct(string $mesaj) { $this->mesaj = $mesaj; }

    public function via($notifiable) { return ['mail']; }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Actualizare comandă PINK CAFÉ')
            ->line($this->mesaj)
            ->action('Vezi comanda', url('/profil/comenzi'))
            ->salutation('Cu drag, Echipa PINK CAFÉ');
    }
}