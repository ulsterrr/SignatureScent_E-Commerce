@extends('layouts.admin.master')
@section('before-css')


@endsection

@section('main-content')
<div class="breadcrumb">
    <h1>Phê duyệt</h1>
    <ul>
        <li><a href="">Biểu mẫu</a></li>
        <li>Phê duyệt</li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <div class="col-md-8">
        <p>For custom Bootstrap form validation messages, you’ll need to add the <code>novalidate</code> boolean attribute to your <code>form</code>. This disables the browser default feedback tooltips, but still provides access to the form validation
            APIs in JavaScript. Try to submit the form below; our JavaScript will intercept the submit button and relay feedback to you. When attempting to submit, you’ll see the <code>:invalid</code> and <code>:valid</code> styles applied
            to your form controls.</p>
        <div class="card mb-4">
            <div class="card-body">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Tên</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                            <div class="valid-feedback">
                                Có vẻ tốt!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Họ</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                            <div class="valid-feedback">
                                Có vẻ tốt!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Tên đăng nhập</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Xin hãy chọn tên đăng nhập
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Thành Phố</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                            <div class="invalid-feedback">
                                Xin hãy chọn thành phố
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Tình trạng</label>
                            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                            <div class="invalid-feedback">
                                Xin hãy chọn tình trạng
                            </div>
                        </div>
                        {{-- <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label" for="invalidCheck">
                                Đồng ý với các điều khoản và điều kiện
                            </label>
                            <div class="invalid-feedback">
                                Bạn phải đồng ý trước khi gửi.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Xác nhận biểu mẫu</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Thông báo chú giải công cụ</div>
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Tên</label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
                            <div class="valid-tooltip">
                                Có vẻ tốt!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Họ</label>
                            <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                            <div class="valid-tooltip">
                                Có vẻ tốt!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipUsername">Tên đăng nhập</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Xin hãy chọn tên đăng nhập
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip03">Thành Phố</label>
                            <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                            <div class="invalid-tooltip">
                                Xin hãy chọn thành phố
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip04">Tình Trạng</label>
                            <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                            <div class="invalid-tooltip">
                                Xin hãy chọn tình trạng
                            </div>
                        </div>
                        {{-- <div class="col-md-3 mb-3">
                            <label for="validationTooltip05">Zip</label>
                            <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                            <div class="invalid-tooltip">
                                Please provide a valid zip.
                            </div>
                        </div> --}}
                    </div>
                    <button class="btn btn-primary" type="submit">Xác nhận biểu mẫu</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js')




@endsection

@section('bottom-js')

<script src="{{asset('assets/js/form.validation.script.js')}}"></script>


@endsection
