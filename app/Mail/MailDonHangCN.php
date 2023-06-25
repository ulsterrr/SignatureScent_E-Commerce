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

class MailDonHangCN extends Mailable
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
        $this->content = 'Bạn có đơn hàng vừa được khách hàng đặt và đã thanh toán qua ví điện tử Momo. Vui lòng thực hiện kiểm tra và phản hồi đơn hàng.';
        return $this->view('mail.mail-donhang-cn')
                    ->subject($this->title)
                    ->with([
                        'dh' => $this->dh,
                        'list' => $this->dh->chiTietDonHang,
                        'content' => $this->content,
                        'title'=>$this->title,
                        'total' => $this->total
                    ]);
    }
}
