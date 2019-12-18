<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Mail;
use App\User;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $user;
    protected $view;
    protected $subject;

    public function __construct($user,$view,$subject)
    {
        $this->user = $user;
        $this->view = $view;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->view == "emailsendnewpassword")
            Mail::to( $this->user["email"])->send(new SendMailable($this->user,$this->view,$this->subject));
        else  
            Mail::to( $this->user->email)->send(new SendMailable($this->user,$this->view,$this->subject)); 
    }
}
