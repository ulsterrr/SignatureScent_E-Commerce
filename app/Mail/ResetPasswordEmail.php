<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     *
     */
    public $content;
    public $title;
    public function __construct($content,$title)
    {
        $this->content = $content;
        $this->title = $title;
    }

    public function build()
    {
        return $this->view('mail.quenmk-mail')->subject($this->title)->with(['content' => $this->content, 'title'=>$this->title]);

    }

}
