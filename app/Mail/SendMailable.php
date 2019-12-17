<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Sichikawa\LaravelSendgridDriver\SendGrid;

class SendMailable extends Mailable
{
    use SendGrid;

    protected $user;
    public $view;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$view)
    {
        $this->user = $user;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'contact@thachcanhnhut.me';
        $subject = '[HealthLife] Please verify your account';
        $name = 'HealthLife';
        return $this->view($this->view) 
                    ->from($address, $name)
                    ->subject($subject)
                    ->with('user',['user'=> $this->user]);
    }
}
