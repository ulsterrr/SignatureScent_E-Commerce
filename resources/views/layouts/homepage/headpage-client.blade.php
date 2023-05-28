<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<script>
    (function(html) {
        html.className = html.className.replace(/\bno-js\b/, 'js')
    })(document.documentElement);

</script>
<title>assets</title>
<!-- <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
    <link rel='dns-prefetch' href='//s.w.org' /> -->
<link rel="alternate" type="application/rss+xml" title="Dòng thông tin ScentSignature &raquo;" href="feed/" />
<link rel="alternate" type="application/rss+xml" title="Dòng phản hồi ScentSignature &raquo;" href="comments/feed/" />
<script type="text/javascript">
    window._wpemojiSettings = {
        "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/72x72\/"
        , "ext": ".png"
        , "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/11\/svg\/"
        , "svgExt": ".svg"
        , "source": {
            "concatemoji": "http:\/\/assets\/wp-includes\/js\/wp-emoji-release.min.js"
        }
    };
    ! function(a, b, c) {
        function d(a, b) {
            var c = String.fromCharCode;
            l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, a), 0, 0);
            var d = k.toDataURL();
            l.clearRect(0, 0, k.width, k.height), l.fillText(c.apply(this, b), 0, 0);
            var e = k.toDataURL();
            return d === e
        }

        function e(a) {
            var b;
            if (!l || !l.fillText) return !1;
            switch (l.textBaseline = "top", l.font = "600 32px Arial", a) {
                case "flag":
                    return !(b = d([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819])) && (b = d([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]), !b);
                case "emoji":
                    return b = d([55358, 56760, 9792, 65039], [55358, 56760, 8203, 9792, 65039]), !b
            }
            return !1
        }

        function f(a) {
            var c = b.createElement("script");
            //c.src = a, c.defer = c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
            c.src = a, c.defer = c.type = "text/javascript", '{{ asset('assets/wp-includes/js/wp-emoji-release.min.js') }}'
        }
        var g, h, i, j, k = b.createElement("canvas")
            , l = k.getContext && k.getContext("2d");
        for (j = Array("flag", "emoji"), c.supports = {
                everything: !0
                , everythingExceptFlag: !0
            }, i = 0; i < j.length; i++) c.supports[j[i]] = e(j[i]), c.supports.everything = c.supports.everything && c.supports[j[i]], "flag" !== j[i] && (c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && c.supports[j[i]]);
        c.supports.everythingExceptFlag = c.supports.everythingExceptFlag && !c.supports.flag, c.DOMReady = !1, c.readyCallback = function() {
            c.DOMReady = !0
        }, c.supports.everything || (h = function() {
            c.readyCallback()
        }, b.addEventListener ? (b.addEventListener("DOMContentLoaded", h, !1), a.addEventListener("load", h, !1)) : (a.attachEvent("onload", h), b.attachEvent("onreadystatechange", function() {
            "complete" === b.readyState && c.readyCallback()
        })), g = c.source || {}, g.concatemoji ? f(g.concatemoji) : g.wpemoji && g.twemoji && (f(g.twemoji), f(g.wpemoji)))
    }(window, document, window._wpemojiSettings);

</script>
<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }

</style>
<link rel='stylesheet' id='dashicons-css' href='{{ asset('assets/wp-includes/css/dashicons.min.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='menu-icons-extra-css' href='{{ asset('assets/wp-content/plugins/ot-flatsome-vertical-menu/libs/menu-icons/css/extra.min.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='wp-block-library-css' href='{{ asset('assets/wp-includes/css/dist/block-library/style.min.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='hrw-css' href='{{ asset('assets/wp-content/plugins/call-now-icon-animate/css.css')}}' type='text/css' media='' />
<link rel='stylesheet' id='contact-form-7-css' href='{{ asset('assets/wp-content/plugins/contact-form-7/includes/css/styles.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='fb-messenger-style-css' href='{{ asset('assets/wp-content/plugins/fb-messenger/css/style.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='ot-vertical-menu-css' href='{{ asset('assets/wp-content/plugins/ot-flatsome-vertical-menu/assets/css/ot-vertical-menu.css')}}' type='text/css' media='all' />
<style id='woocommerce-inline-inline-css' type='text/css'>
    .woocommerce form .form-row .required {
        visibility: visible;
    }

</style>
<script type='text/javascript' src='{{ asset('assets/wp-includes/js/jquery/jquery.js')}}'></script>
<script type='text/javascript' src='{{ asset('assets/wp-includes/js/jquery/jquery-migrate.min.js')}}'></script>
<link rel='https://api.w.org/' href='wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
<meta name="generator" content="WordPress 5.0.10" />
<meta name="generator" content="WooCommerce 3.5.3" />
<link rel="canonical" href="" />
<link rel='shortlink' href='' />
@yield('before-css')
{{-- theme css --}}
<link rel='stylesheet' id='flatsome-icons-css' href='{{ asset('assets/wp-content/themes/flatsome/assets/css/fl-icons.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='easy-social-share-buttons-css' href='{{ asset('assets/wp-content/plugins/easy-social-share-buttons3/assets/css/default-retina/easy-social-share-buttons.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='essb-cct-style-css' href='{{ asset('assets/wp-content/plugins/easy-social-share-buttons3/lib/modules/click-to-tweet/assets/css/styles.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='bfa-font-awesome-css' href='https://cdn.jsdelivr.net/fontawesome/4.7.0/css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-main-css' href='{{ asset('assets/wp-content/themes/flatsome/assets/css/flatsome.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-shop-css' href='{{ asset('assets/wp-content/themes/flatsome/assets/css/flatsome-shop.css')}}' type='text/css' media='all' />
<link rel='stylesheet' id='flatsome-style-css' href='{{ asset('assets/wp-content/themes/flatsome-child/style.css')}}' type='text/css' media='all' />
{{-- page specific css --}}
@yield('page-css')
<style>
    .mypage-alo-ph-circle {
        border-color: #cc9a00;
    }

    .mypage-alo-ph-circle-fill {
        background-color: #cc9a00;
    }

    .mypage-alo-ph-img-circle {
        background-color: #cc9a00;
    }

    .mypage-alo-phone:hover .mypage-alo-ph-circle {
        border-color: #43b91e;
    }

    .mypage-alo-phone:hover .mypage-alo-ph-circle-fill {
        background-color: #43b91e;
    }

    .mypage-alo-phone:hover .mypage-alo-ph-img-circle {
        background-color: #43b91e;
    }

</style>
<style>
    .bg {
        opacity: 0;
        transition: opacity 1s;
        -webkit-transition: opacity 1s;
    }

    .bg-loaded {
        opacity: 1;
    }

</style>
<!--[if IE]><link rel="stylesheet" type="text/css" href="wp-content/themes/flatsome/assets/css/ie-fallback.css"><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script><script>var head = document.getElementsByTagName('head')[0],style = document.createElement('style');style.type = 'text/css';style.styleSheet.cssText = ':before,:after{content:none !important';head.appendChild(style);setTimeout(function(){head.removeChild(style);}, 0);</script><script src="wp-content/themes/flatsome/assets/libs/ie-flexibility.js"></script><![endif]-->
<script type="text/javascript">
    WebFontConfig = {
        google: {
            families: ["Lora:regular,700", "Lora:regular,regular", "Lora:regular,700", "Dancing+Script", ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();

</script>
<noscript>
    <style>
        .woocommerce-product-gallery {
            opacity: 1 !important;
        }

    </style>
</noscript>
<style type="text/css">
    .essb_links_list li.essb_totalcount_item .essb_t_l_big .essb_t_nb:after,
    .essb_links_list li.essb_totalcount_item .essb_t_r_big .essb_t_nb:after {
        color: #777777;
        content: "shares";
        display: block;
        font-size: 11px;
        font-weight: normal;
        text-align: center;
        text-transform: uppercase;
        margin-top: -5px;
    }

    .essb_links_list li.essb_totalcount_item .essb_t_l_big,
    .essb_links_list li.essb_totalcount_item .essb_t_r_big {
        text-align: center;
    }

    .essb_displayed_sidebar .essb_links_list li.essb_totalcount_item .essb_t_l_big .essb_t_nb:after,
    .essb_displayed_sidebar .essb_links_list li.essb_totalcount_item .essb_t_r_big .essb_t_nb:after {
        margin-top: 0px;
    }

    .essb_displayed_sidebar_right .essb_links_list li.essb_totalcount_item .essb_t_l_big .essb_t_nb:after,
    .essb_displayed_sidebar_right .essb_links_list li.essb_totalcount_item .essb_t_r_big .essb_t_nb:after {
        margin-top: 0px;
    }

    .essb_totalcount_item_before,
    .essb_totalcount_item_after {
        display: block !important;
    }

    .essb_totalcount_item_before .essb_totalcount,
    .essb_totalcount_item_after .essb_totalcount {
        border: 0px !important;
    }

    .essb_counter_insidebeforename {
        margin-right: 5px;
        font-weight: bold;
    }

    .essb_width_columns_1 li {
        width: 100%;
    }

    .essb_width_columns_1 li a {
        width: 92%;
    }

    .essb_width_columns_2 li {
        width: 49%;
    }

    .essb_width_columns_2 li a {
        width: 86%;
    }

    .essb_width_columns_3 li {
        width: 32%;
    }

    .essb_width_columns_3 li a {
        width: 80%;
    }

    .essb_width_columns_4 li {
        width: 24%;
    }

    .essb_width_columns_4 li a {
        width: 70%;
    }

    .essb_width_columns_5 li {
        width: 19.5%;
    }

    .essb_width_columns_5 li a {
        width: 60%;
    }

    .essb_width_columns_6 li {
        width: 16%;
    }

    .essb_width_columns_6 li a {
        width: 55%;
    }

    .essb_links li.essb_totalcount_item_before,
    .essb_width_columns_1 li.essb_totalcount_item_after {
        width: 100%;
        text-align: left;
    }

    .essb_network_align_center a {
        text-align: center;
    }

    .essb_network_align_right .essb_network_name {
        float: right;
    }

</style>
<script type="text/javascript">
    var essb_settings = {
        "ajax_url": "http:\/\/assets\/wp-admin\/admin-ajax.php"
        , "essb3_nonce": "ddc5d423a7"
        , "essb3_plugin_url": "http:\/\/assets\/wp-content\/plugins\/easy-social-share-buttons3"
        , "essb3_facebook_total": true
        , "essb3_admin_ajax": false
        , "essb3_internal_counter": false
        , "essb3_stats": false
        , "essb3_ga": false
        , "essb3_ga_mode": "simple"
        , "essb3_counter_button_min": 0
        , "essb3_counter_total_min": 0
        , "blog_url": "http:\/\/assets\/"
        , "ajax_type": "wp"
        , "essb3_postfloat_stay": false
        , "essb3_no_counter_mailprint": false
        , "essb3_single_ajax": false
        , "twitter_counter": "self"
        , "post_id": 16
    };

</script>
<style id="custom-css" type="text/css">
    :root {
        --primary-color: #1774cf;
    }

    .full-width .ubermenu-nav,
    .container,
    .row {
        max-width: 1230px
    }

    .row.row-collapse {
        max-width: 1200px
    }

    .row.row-small {
        max-width: 1222.5px
    }

    .row.row-large {
        max-width: 1260px
    }

    body.framed,
    body.framed header,
    body.framed .header-wrapper,
    body.boxed,
    body.boxed header,
    body.boxed .header-wrapper,
    body.boxed .is-sticky-section {
        max-width: 1260px
    }

    .header-main {
        height: 69px
    }

    #logo img {
        max-height: 100px
    }

    #logo {
        width: 200px;
    }

    .header-bottom {
        min-height: 52px
    }

    .header-top {
        min-height: 30px
    }

    .transparent .header-main {
        height: 102px
    }

    .transparent #logo img {
        max-height: 102px
    }

    .has-transparent+.page-title:first-of-type,
    .has-transparent+#main>.page-title,
    .has-transparent+#main>div>.page-title,
    .has-transparent+#main .page-header-wrapper:first-of-type .page-title {
        padding-top: 152px;
    }

    .header.show-on-scroll,
    .stuck .header-main {
        height: 70px !important
    }

    .stuck #logo img {
        max-height: 70px !important
    }

    .header-bg-color,
    .header-wrapper {
        background-color: #ffffff
    }

    .header-bottom {
        background-color: #444444
    }

    .stuck .header-main .nav>li>a {
        line-height: 50px
    }

    .header-bottom-nav>li>a {
        line-height: 16px
    }

    @media (max-width: 549px) {
        .header-main {
            height: 70px
        }

        #logo img {
            max-height: 70px
        }
    }

    .nav-dropdown {
        font-size: 90%
    }

    /* Color */
    .accordion-title.active,
    .has-icon-bg .icon .icon-inner,
    .logo a,
    .primary.is-underline,
    .primary.is-link,
    .badge-outline .badge-inner,
    .nav-outline>li.active>a,
    .nav-outline>li.active>a,
    .cart-icon strong,
    [data-color='primary'],
    .is-outline.primary {
        color: #1774cf;
    }

    /* Color !important */
    [data-text-color="primary"] {
        color: #1774cf !important;
    }

    /* Background Color */
    [data-text-bg="primary"] {
        background-color: #1774cf;
    }

    /* Background */
    .scroll-to-bullets a,
    .featured-title,
    .label-new.menu-item>a:after,
    .nav-pagination>li>.current,
    .nav-pagination>li>span:hover,
    .nav-pagination>li>a:hover,
    .has-hover:hover .badge-outline .badge-inner,
    button[type="submit"],
    .button.wc-forward:not(.checkout):not(.checkout-button),
    .button.submit-button,
    .button.primary:not(.is-outline),
    .featured-table .title,
    .is-outline:hover,
    .has-icon:hover .icon-label,
    .nav-dropdown-bold .nav-column li>a:hover,
    .nav-dropdown.nav-dropdown-bold>li>a:hover,
    .nav-dropdown-bold.dark .nav-column li>a:hover,
    .nav-dropdown.nav-dropdown-bold.dark>li>a:hover,
    .is-outline:hover,
    .tagcloud a:hover,
    .grid-tools a,
    input[type='submit']:not(.is-form),
    .box-badge:hover .box-text,
    input.button.alt,
    .nav-box>li>a:hover,
    .nav-box>li.active>a,
    .nav-pills>li.active>a,
    .current-dropdown .cart-icon strong,
    .cart-icon:hover strong,
    .nav-line-bottom>li>a:before,
    .nav-line-grow>li>a:before,
    .nav-line>li>a:before,
    .banner,
    .header-top,
    .slider-nav-circle .flickity-prev-next-button:hover svg,
    .slider-nav-circle .flickity-prev-next-button:hover .arrow,
    .primary.is-outline:hover,
    .button.primary:not(.is-outline),
    input[type='submit'].primary,
    input[type='submit'].primary,
    input[type='reset'].button,
    input[type='button'].primary,
    .badge-inner {
        background-color: #1774cf;
    }

    /* Border */
    .nav-vertical.nav-tabs>li.active>a,
    .scroll-to-bullets a.active,
    .nav-pagination>li>.current,
    .nav-pagination>li>span:hover,
    .nav-pagination>li>a:hover,
    .has-hover:hover .badge-outline .badge-inner,
    .accordion-title.active,
    .featured-table,
    .is-outline:hover,
    .tagcloud a:hover,
    blockquote,
    .has-border,
    .cart-icon strong:after,
    .cart-icon strong,
    .blockUI:before,
    .processing:before,
    .loading-spin,
    .slider-nav-circle .flickity-prev-next-button:hover svg,
    .slider-nav-circle .flickity-prev-next-button:hover .arrow,
    .primary.is-outline:hover {
        border-color: #1774cf
    }

    .nav-tabs>li.active>a {
        border-top-color: #1774cf
    }

    .widget_shopping_cart_content .blockUI.blockOverlay:before {
        border-left-color: #1774cf
    }

    .woocommerce-checkout-review-order .blockUI.blockOverlay:before {
        border-left-color: #1774cf
    }

    /* Fill */
    .slider .flickity-prev-next-button:hover svg,
    .slider .flickity-prev-next-button:hover .arrow {
        fill: #1774cf;
    }

    @media screen and (max-width: 549px) {
        body {
            font-size: 100%;
        }
    }

    body {
        font-family: "Lora", sans-serif
    }

    body {
        font-weight: 0
    }

    body {
        color: #353535
    }

    .nav>li>a {
        font-family: "Lora", sans-serif;
    }

    .nav>li>a {
        font-weight: 700;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .heading-font,
    .off-canvas-center .nav-sidebar.nav-vertical>li>a {
        font-family: "Lora", sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .heading-font,
    .banner h1,
    .banner h2 {
        font-weight: 700;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .heading-font {
        color: #444444;
    }

    .alt-font {
        font-family: "Dancing Script", sans-serif;
    }

    a {
        color: #444444;
    }

    a:hover {
        color: #1774cf;
    }

    .tagcloud a:hover {
        border-color: #1774cf;
        background-color: #1774cf;
    }

    @media screen and (min-width: 550px) {
        .products .box-vertical .box-image {
            min-width: 300px !important;
            width: 300px !important;
        }
    }

    .footer-2 {
        background-color: #777777
    }

    .absolute-footer,
    html {
        background-color: #292929
    }

    .label-new.menu-item>a:after {
        content: "New";
    }

    .label-hot.menu-item>a:after {
        content: "Hot";
    }

    .label-sale.menu-item>a:after {
        content: "Sale";
    }

    .label-popular.menu-item>a:after {
        content: "Popular";
    }

</style>
