<!-- Mobile Sidebar -->
<div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
    <div class="sidebar-menu no-scrollbar ">
        <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-16 current_page_item menu-item-24"><a href="" class="nav-top-link">Trang chủ</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22"><a href="{{route('gioithieu-view')}}" class="nav-top-link">Giới thiệu</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-54"><a href="{{route('cuahang-view')}}" class="nav-top-link">Cửa hàng</a>
                <ul class=children>
                    @foreach ($loaiSP as $data )
                    <li id="menu-item-837" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat  menu-item-837"><a href='../cua-hang?maloai={{$data->MaLoai}}'>{{$data->TenLoai}}</a></li>
                    @endforeach
                </ul>
            </li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-25"><a href="{{route('tintuc-view')}}" class="nav-top-link">Tin tức</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23"><a href="{{route('lienhe-view')}}" class="nav-top-link">Liên hệ</a></li>
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
{{-- <div id="fbMsg">
    <img data-remodal-target="fb-messenger" src="{{asset('assets/wp-content/plugins/fb-messenger/images/fb-messenger.png')}}">
</div> --}}
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
