<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MembershipRejected extends Notification
{
    use Queueable;

    protected $membership;

    
    public function __construct($membership)
    {
        $this->membership = $membership;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Membership Anda Ditolak')
            ->greeting('Halo ' . $this->membership->name . '!')
            ->line('Kami mohon maaf, membership Anda di gym ' . $this->membership->gym->gym_name . ' tidak dapat kami verifikasi.')
            ->line('Berikut detail membership Anda:')
            ->line('Nama: ' . $this->membership->name)
            ->line('Email: ' . $this->membership->email)
            ->line('Status: Ditolak')
            ->line('Jika Anda merasa ini adalah kesalahan, silahkan hubungi pemilik gym tersebut dengan nomor ' . $this->membership->gym->no_hpowner)
            ->line('Terima kasih.')
            ->salutation('Hormat Kami,') 
            ->line('Tim GYM Spot'); 

    }
}
