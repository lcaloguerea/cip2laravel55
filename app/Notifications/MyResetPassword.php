<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
 
class MyResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        $email = $notifiable['email'];
        $dest = $notifiable['name'];
        $codigo = $this->token;

        /*
        \Mail::send('emails.reset',array('destinatario' => $dest, 'codigo' => $codigo), function($message) use ($email, $dest) {
            $message->to($email,$dest)
                ->subject('Cambio de contraseña');
        });*/

        return (new MailMessage)->view('emails.reset',
             ['destinatario' => $dest,'codigo' => $codigo], function($message) use ($email, $dest) {
            $message->to($email,$dest)
                ->subject('Cambio de contraseña');
        });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
