<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // ...
    }

    public function boot(): void
    {
        // AICI ÎNCEPE CODUL NOSTRU PERSONALIZAT PENTRU EMAIL
        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            
            // Construim link-ul pe care va da click utilizatorul
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));

            // Construim designul și textul emailului
            return (new MailMessage)
                ->subject('Resetare parolă - PINK CAFÉ')
                ->greeting('Salut!')
                ->line('Ai primit acest email deoarece am înregistrat o cerere de resetare a parolei pentru contul tău la PINK CAFÉ.')
                ->action('Resetează Parola', $url)
                ->line('Acest link de resetare va expira în 60 de minute.')
                ->line('Dacă nu ai cerut resetarea parolei, te rugăm să ignori acest mesaj. Nu este necesară nicio altă acțiune.')
                ->salutation('Cu drag, Echipa PINK CAFÉ');
        });
    }
}
