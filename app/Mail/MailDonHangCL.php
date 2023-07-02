<?php

namespace App\Mail;

use App\Models\ChiNhanh;
use App\Models\ChiTietSanPham;
use App\Models\DonHang;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MailDonHangCL extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->chi_tiet_dh);
        $this->content = 'Bạn vừa đặt đơn hàng thành công. Vui lòng đợi chi nhánh bán hàng giao hàng cho nhà vận chuyển.';
        return $this->view('mail.mail-donhang-client')
                    ->subject($this->title)
                    ->with([
                        'dh' => $this->dh,
                        'list' => $this->chi_tiet_dh,
                        'content' => $this->content,
                        'title'=>$this->title,
                        'total' => $this->total
                    ]);
    }
}
