<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MembershipVerified extends Notification
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
        
        $gym = $this->membership->gym;

       
        return (new MailMessage)
            ->subject('Membership Anda Telah Diverifikasi')
            ->view('dashboard.membership.email-verifikasi', [
                'membership' => $this->membership,
                'gym' => $gym
            ]);
    }
}
