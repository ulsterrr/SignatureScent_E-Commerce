<?php

namespace App\Jobs;

use App\Mail\NotifiMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $id;
    public $email;
    public $content;
    public $title;
    public function __construct($id, $email, $content,$title)
    {
        $this->id = $id;
        $this->email = $email;
        $this->content = $content;
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->id);
        Mail::to($this->email)->send(new NotifiMail($user, $this->content,$this->title));
    }
}
