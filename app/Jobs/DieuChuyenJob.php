<?php

namespace App\Jobs;

use App\Mail\MailDieuChuyen;
use App\Models\ChiNhanh;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DieuChuyenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $email_chuyen;
    public $email_nhan;
    public $chi_nhanhA;
    public $chi_nhanhB;
    public $content;
    public $title;
    public $list;
    public function __construct($email_chuyen, $email_nhan, ChiNhanh $chi_nhanhA, ChiNhanh $chi_nhanhB, $content, $title, $list)
    {
        $this->email_chuyen = $email_chuyen;
        $this->email_nhan = $email_nhan;
        $this->chi_nhanhA = $chi_nhanhA;
        $this->chi_nhanhB = $chi_nhanhB;
        $this->content = $content;
        $this->title = $title;
        $this->list = $list;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email_chuyen)->send(new MailDieuChuyen($this->chi_nhanhA, $this->chi_nhanhB,$this->content,$this->title,$this->list, 'chuyen'));
        Mail::to($this->email_nhan)->send(new MailDieuChuyen($this->chi_nhanhA, $this->chi_nhanhB,$this->content,$this->title,$this->list, 'nhan'));
    }
}
