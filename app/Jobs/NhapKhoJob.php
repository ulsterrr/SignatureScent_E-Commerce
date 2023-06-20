<?php

namespace App\Jobs;

use App\Mail\MailDieuChuyen;
use App\Mail\MailNhapKho;
use App\Models\ChiNhanh;
use App\Models\ChiTietSanPham;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NhapKhoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $msp;
    public $chi_nhanh;
    public $content;
    public $title;
    public $list;
    public function __construct($msp, ChiNhanh $chi_nhanh, $content, $title, $list)
    {
        $this->msp = $msp;
        $this->chi_nhanh = $chi_nhanh;
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
        Mail::to($this->chi_nhanh->NguoiQuanLy)->send(new MailNhapKho($this->msp, $this->chi_nhanh ,$this->content,$this->title,$this->list));
    }
}
