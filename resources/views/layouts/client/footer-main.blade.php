<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-16 current_page_item menu-item-24"><a href="" class="nav-top-link">Trang chủ</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="gioi-thieu/" class="nav-top-link">Giới thiệu</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-54"><a href="cua-hang/" class="nav-top-link">Cửa hàng</a>
                <ul class=children>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-837"><a href="danh-muc/skincare/">Skincare</a></li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-838"><a href="danh-muc/lipstick/">Lipstick</a></li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-839"><a href="danh-muc/gloss/">Gloss</a></li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-840"><a href="danh-muc/nail/">Nail</a></li>
                    <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-841"><a href="danh-muc/vani-beauty/">ScentSignature</a></li>
                </ul>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-25"><a href="category/tin-tuc/" class="nav-top-link">Tin tức</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23"><a href="lien-he/" class="nav-top-link">Liên hệ</a></li>
        </ul>
    </div>
    <!-- inner -->
</div>
<!-- #mobile-menu -->
<a href="tel:0909090090" class="hotlinemp" rel="nofollow">
    <div class="mypage-alo-phone">
        <div class="animated infinite zoomIn mypage-alo-ph-circle">
        </div>
        <div class="animated infinite pulse mypage-alo-ph-circle-fill">
        </div>
        <div class="animated infinite tada mypage-alo-ph-img-circle">
        </div>
    </div>
</a>
<!-- FB Messenger -->
<div id="fbMsg">
    <img data-remodal-target="fb-messenger" src="{{asset('assets/wp-content/plugins/fb-messenger/images/fb-messenger.png')}}">
</div>
<div class="remodal" data-remodal-id="fb-messenger">
    <div class="fb-page" data-tabs="messages" data-href="" data-width="310" data-height="330" data-href="" data-small-header="true" data-hide-cover="false" data-show-facepile="true" data-adapt-container-width="true">
        <div class="fb-xfbml-parse-ignore">
            <blockquote>Loading...</blockquote>
        </div>
    </div>
</div>
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        //js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- End FB Messenger -->
<div id="login-form-popup" class="lightbox-content mfp-hide">
    <div class="woocommerce-notices-wrapper"></div>
    <div class="account-container lightbox-inner">
        <div class="account-login-inner">
            <h3 class="uppercase">Đăng nhập</h3>
            <form class="woocommerce-form woocommerce-form-login login" method="post">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username">Tên tài khoản hoặc địa chỉ email&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="password">Mật khẩu&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                </p>
                <p class="form-row">
                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="ce90bf198c" /><input type="hidden" name="_wp_http_referer" value="/scentsignature/" /> <button type="submit" class="woocommerce-Button button" name="login" value="Đăng nhập">Đăng nhập</button>
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
