<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="loading-site no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <title>Admin Dashboard</title> --}}
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    @yield('before-css')
    {{-- theme css --}}
    {{-- <link id="gull-theme" rel="stylesheet" href="{{  asset('assets/styles/css/themes/lite-purple.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}"> --}}
    <link id="client-css" rel="stylesheet" href="{{  asset('assets/styles/css/themes/client-page.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic-client.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/pickadate/classic-client.date.css')}}">
    {{-- page specific css --}}
    @yield('page-css')
    @include('layouts.homepage.headpage-client')
</head>

<body class="home page-template page-template-page-transparent-header-light page-template-page-transparent-header-light-php page page-id-16 woocommerce-no-js lightbox">
    {{-- <a class="skip-link screen-reader-text" href="#main">Skip to content</a> --}}

    @php
    $layout = session('layout.client');
    @endphp

    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">
        <div class="loader spinner-bubble spinner-bubble-primary">
        </div>
    </div>
    <!-- Pre Loader end  -->

    <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">

        <!-- ============ Body content start ============= -->

            <div id="wrapper">
                @include('layouts.webpage.header-webpage')

                <!-- ============ end of header menu ============= -->
                <main id="main" class="">
                    <div id="content" role="main">
                    {{-- <div class="main-content"> --}}
                    @yield('main-content')
                    </div>
                </main>

                @include('layouts.webpage.footer-webpage')
                @include('layouts.webpage.footer-main')
            </div>
        <!-- ============ Body content End ============= -->
    </div>

    {{-- common js --}}
    <script src="{{  asset('assets/js/common-bundle-script.js')}}"></script>
    {{-- page specific javascript --}}
    @yield('page-js')

    <script src="{{asset('assets/js/script.js')}}"></script>


    {{-- laravel js --}}
    {{-- <script src="{{mix('assets/js/laravel/app.js')}}"></script> --}}
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            //js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>
    <script type="text/javascript">
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;

    </script>
    <link rel='stylesheet' id='flatsome-countdown-style-css' href='{{ asset('assets/wp-content/themes/flatsome/inc/shortcodes/ux_countdown/ux-countdown.css')}}' type='text/css' media='all' />
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wpcf7 = {
            "apiSettings": {
                "root": "http:\/\/assets\/wp-json\/contact-form-7\/v1"
                , "namespace": "contact-form-7\/v1"
            }
        };
        /* ]]> */

    </script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/contact-form-7/includes/js/scripts.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/fb-messenger/js/index.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/ot-flatsome-vertical-menu/assets/js/ot-vertical-menu.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/inc/extensions/flatsome-live-search/flatsome-live-search.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-includes/js/hoverIntent.min.js')}}'></script>
    <script type='text/javascript'>
        var flatsomeVars = {
            "ajaxurl": "http:\/\/assets\/wp-admin\/admin-ajax.php"
            , "rtl": ""
            , "sticky_height": "70"
            , "user": {
                "can_edit_pages": false
            }
        };
    </script>

    <script>
        $(document).ready(function(){
            $('#picker2, #picker3').pickadate({
                selectMonths: true,
                selectYears:true,
            });
        });
    </script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('assets/js/modal.script.js')}}"></script>
    <script src="{{asset('assets/js/numeral.min.js')}}"></script>
    <script src="{{asset('assets/js/cleave.min.js')}}"></script>
    <script src="{{asset('assets/js/cleave.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>

    {{-- bộ thư viện jQuery Validate Plugin 1.19.5 --}}
    <script src="{{asset('assets/js/validatior_plugin/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/validatior_plugin/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/validatior_plugin/messages_vi.js')}}"></script>


    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/assets/js/flatsome.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/assets/js/woocommerce.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-includes/js/wp-embed.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/assets/libs/packery.pkgd.min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/inc/shortcodes/ux_countdown/countdown-script-min.js')}}'></script>
    <script type='text/javascript' src='{{ asset('assets/wp-content/themes/flatsome/inc/shortcodes/ux_countdown/ux-countdown.js')}}'></script>
    {{-- <script type='text/javascript' src='{{ asset('assets/wp-includes/js/zxcvbn-async.min.js')}}'></script> --}}
    {{-- <script type='text/javascript' src='{{ asset('assets/wp-includes/js/zxcvbn.min.js')}}'></script> --}}
    {{-- <script type='text/javascript' src='{{ asset('assets/wp-admin/js/password-strength-meter.min.js')}}'></script> --}}
    <script type='text/javascript' src='{{ asset('assets/wp-content/plugins/woocommerce/assets/js/frontend/password-strength-meter.min.js')}}'></script>
    <style type="text/css"></style>

    @yield('bottom-js')
</body>

</html>
