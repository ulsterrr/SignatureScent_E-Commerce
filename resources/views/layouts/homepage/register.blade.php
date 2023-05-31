<div id="login-form-popup" class="lightbox-content mfp-hide">
    <div class="woocommerce-notices-wrapper"></div>
    <div class="account-container lightbox-inner">
        <div class="account-login-inner" style="margin-top: 3% !importane;">
            <h3 class="uppercase">Đăng nhập</h3>
            <form class="woocommerce-form woocommerce-form-login login" action="{{ route('xuly-dangnhap') }}" method="post">
                @csrf
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username">Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" autocomplete="username" value="" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                </p>
                <h6 style="color:red;">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>

                </h6>
                <p class="form-row">
                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="ce90bf198c" /><input type="hidden" name="_wp_http_referer" value="/scentsignature/" /> <button type="submit" class="woocommerce-Button button" id="login" name="login" value="Đăng nhập">Đăng nhập</button>
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Ghi nhớ mật khẩu</span>
                    </label>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                    <a href="tai-khoan/lost-password/">Quên mật khẩu?</a>
                </p>
            </form>
        </div>
        <!-- .login-inner -->
    </div>
    <!-- .account-login-container -->
</div>
