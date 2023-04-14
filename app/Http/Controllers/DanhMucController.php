<?php

namespace App\Http\Controllers;

use App\Models\ChiNhanh;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function loadDSFeedback(){

        return view('he-thong.danh-muc.feedback.feedback');
    }
}
