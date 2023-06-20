<?php

namespace App\Mail;

use App\Models\ChiNhanh;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class MailDieuChuyenDone extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $content;
    public $title;
    public $list_sp;
    public $type;
    public $A, $B;

    public function __construct(ChiNhanh $A, ChiNhanh $B, $content, $title, $list_sp, $type)
    {
        $this->content = $content;
        $this->title = $title;
        $this->list_sp = $list_sp;
        $this->type = $type;
        $this->A = $A;
        $this->B = $B;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->content = 'Xin chào! Bạn có thông tin điều chuyển được tạo từ hệ thống yêu cầu bên chi nhánh
                        '
                        . $this->A->TenChiNhanh.', địa chỉ: '.$this->A->DiaChi . ', '.$this->A->QuanHuyen . ', '.$this->A->TinhThanh . ', Số điện thoại: '.$this->A->SDT1 .
                        ', thực hiện điều chuyển đến chi nhánh:
                        '
                        . $this->B->TenChiNhanh . ' địa chỉ: ' . $this->B->DiaChi . ', '.$this->B->QuanHuyen . ', '.$this->B->TinhThanh . ', Số điện thoại: ' .$this->B->SDT1
                        . '
                        Lý do: '. $this->list_sp->LyDoDieuChuyen
                        . '
                        Điều chuyển thành công, các sản phẩm trong phiếu điều chuyển đã được đổi thông tin chi nhánh trên hệ thống: ';

        return $this->view('mail.mail-dieuchuyen-done')
                    ->subject($this->title)
                    ->with([
                        'content' => $this->content,
                        'title'=>$this->title,
                        'list_sp'=>$this->list_sp,
                        'type'=>$this->type, 'A'=>$this->A, 'B'=>$this->B
                    ]);
    }
}
