<?php

namespace App\Jobs;

use App\Mail\MailDieuChuyen;
use App\Mail\MailDieuChuyenDone;
use App\Models\ChiNhanh;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DieuChuyenDone implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $content;
    public $title;
    public $list;
    public ChiNhanh $A;
    public ChiNhanh $B;
    public function __construct(ChiNhanh $A, ChiNhanh $B, $content, $title, $list)
    {
        $this->content = $content;
        $this->title = $title;
        $this->list = $list;
        $this->A = $A;
        $this->B = $B;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->A->NguoiQuanLy)->send(new MailDieuChuyenDone($this->A, $this->B, $this->content,$this->title,$this->list, 'chuyen'));
        Mail::to($this->B->NguoiQuanLy)->send(new MailDieuChuyenDone($this->A, $this->B, $this->content,$this->title,$this->list, 'nhan'));
    }
}
