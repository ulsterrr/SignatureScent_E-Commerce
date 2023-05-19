<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class NotifiMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $content;
    public $title;
    public $user;

    public function __construct(User $user, $content,$title)
    {
        $this->content = $content;
        $this->title = $title;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('mail.notifi-mail')->subject($this->title)->with(['content' => $this->content, 'title'=>$this->title]);
    // }
    public function build()
    {
        // $verificationUrl = $this->buildVerificationUrl($this->user->userId, $this->user->token);
        // dd($this->user);
        return $this->view('mail.notifi-mail')
                    ->subject($this->title)
                    ->with([
                        'content' => $this->content,
                        'user' => $this->user,
                        'title'=>$this->title
                    ]);
    }

}

