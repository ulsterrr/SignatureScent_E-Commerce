<?php

namespace App\Mail;

use App\Models\ChiNhanh;
use App\Models\ChiTietSanPham;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MailNhapKho extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msp;
    public $content;
    public $title;
    public $list_sp;
    public $type;

    public ChiNhanh $A;

    public function __construct($msp, ChiNhanh $A, $content, $title, $list_sp)
    {
        $this->msp = $msp;
        $this->content = $content;
        $this->title = $title;
        $this->list_sp = $list_sp;
        $this->A = $A;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->content = 'Xin chào! Bạn có thông tin nhập kho được tạo từ hệ thống cho chi nhánh:
                         '
                         . $this->A->TenChiNhanh.', địa chỉ: '.$this->A->DiaChi . ', '.$this->A->QuanHuyen . ', '.$this->A->TinhThanh . '. Số điện thoại: '.$this->A->SDT1  .
                         '
                         Thông tin các sản phẩm được nhập kho: ';
        return $this->view('mail.mail-nhapkho')
                    ->subject($this->title)
                    ->with([
                        'msp' => $this->msp,
                        'content' => $this->content,
                        'title'=>$this->title,
                        'list_sp'=>$this->list_sp,
                        'type'=>$this->type, 'A' => $this->A
                    ]);
    }
}
