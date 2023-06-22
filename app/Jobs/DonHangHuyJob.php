<?php

namespace App\Jobs;

use App\Mail\MailDieuChuyen;
use App\Mail\MailDonHang;
use App\Mail\MailDonHangHuy;
use App\Mail\MailNhapKho;
use App\Models\ChiNhanh;
use App\Models\ChiTietSanPham;
use App\Models\DonHang;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DonHangHuyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $dh;
    public $chi_tiet_dh;
    public $content;
    public $title;
    public $total;
    public function __construct(DonHang $dh, $chi_tiet_dh, $content, $title, $total)
    {
        $this->dh = $dh;
        $this->chi_tiet_dh = $chi_tiet_dh;
        $this->content = $content;
        $this->title = $title;
        $this->total = $total;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->dh->Email)->send(new MailDonHangHuy($this->dh, $this->chi_tiet_dh ,$this->content,$this->title, $this->total));
    }
}
