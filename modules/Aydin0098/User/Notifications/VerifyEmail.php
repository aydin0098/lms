<?php

namespace Aydin0098\User\Notifications;

use Aydin0098\User\Mail\VerifyCodeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use function url;

class VerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return VerifyCodeMail
     */
    public function toMail($notifiable)
    {
        $code = random_int(100000,999999);
        cache()->set(
            'verify_code_' .$notifiable->id,
            $code,
            now()->addDay());

        return ( new VerifyCodeMail($notifiable,$code))
            ->to($notifiable->email)
            ->subject('دیجی آکادمی | کد فعالسازی');
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
