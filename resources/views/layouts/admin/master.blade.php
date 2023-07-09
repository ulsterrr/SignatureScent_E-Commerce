<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    @yield('before-css')
    {{-- theme css --}}
    <link id="gull-theme" rel="stylesheet" href="{{  asset('assets/styles/css/themes/lite-purple.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/styles/vendor/perfect-scrollbar.css')}}">
    {{-- page specific css --}}
    @yield('page-css')
</head>


<body class="text-left">
    @php
    $layout = session('layout');
    @endphp

    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">

        {{-- <div class="loader spinner-bubble spinner-bubble-primary">

        </div> --}}

        <div class="loader spinner spinner-primary"></div>
    </div>
    <!-- Pre Loader end  -->







    <!-- ============ Compact Layout start ============= -->
    @if ($layout=="compact")

    <div class="app-admin-wrap layout-sidebar-compact sidebar-dark-purple sidenav-open clearfix">
        @include('layouts.compact-sidebar')

        <!-- ============ end of left sidebar ============= -->


        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap d-flex flex-column">
            @include('layouts.admin.header-menu')

            <!-- ============ end of header menu ============= -->
            <div class="main-content">
                @yield('main-content')
            </div>

            @include('layouts.admin.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    @include('layouts.admin.search')
    <!-- ============ Search UI End ============= -->

    {{-- @include('layouts.compact-customizer') --}}



    <!-- ============ Compact Layout End ============= -->











    <!-- ============ Horizontal Layout start ============= -->

    @elseif($layout=="horizontal")

    <div class="app-admin-wrap layout-horizontal-bar clearfix">
        @include('layouts.admin.header-menu')

        <!-- ============ end of header menu ============= -->



        @include('layouts.horizontal-bar')

        <!-- ============ end of left sidebar ============= -->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap  d-flex flex-column">
            <div class="main-content">
                @yield('main-content')
            </div>

            @include('layouts.admin.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    @include('layouts.admin.search')
    <!-- ============ Search UI End ============= -->

    {{-- @include('layouts.horizontal-customizer') --}}


    <!-- ============ Horizontal Layout End ============= -->














    <!-- ============ Large SIdebar Layout start ============= -->
    @elseif($layout=="normal")

    <div class="app-admin-wrap layout-sidebar-large clearfix">
        @include('layouts.admin.header-menu')

        <!-- ============ end of header menu ============= -->



        @include('layouts.admin.sidebar')

        <!-- ============ end of left sidebar ============= -->

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                @yield('main-content')
            </div>

            @include('layouts.admin.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    @include('layouts.admin.search')
    <!-- ============ Search UI End ============= -->

    {{-- @include('layouts.admin.large-sidebar-customizer') --}}


    <!-- ============ Large Sidebar Layout End ============= -->





    @else
    <!-- ============Deafult  Large SIdebar Layout start ============= -->

    {{-- normal layout --}}
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        @include('layouts.admin.header-menu')
        {{-- end of header menu --}}



        @include('layouts.admin.sidebar')
        {{-- end of left sidebar --}}

        <!-- ============ Body content start ============= -->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <div class="main-content">
                @yield('main-content')
            </div>

            @include('layouts.admin.footer')
        </div>
        <!-- ============ Body content End ============= -->
    </div>
    <!--=============== End app-admin-wrap ================-->

    <!-- ============ Search UI Start ============= -->
    @include('layouts.admin.search')
    <!-- ============ Search UI End ============= -->

    {{-- @include('layouts.admin.large-sidebar-customizer') --}}


    <!-- ============ Large Sidebar Layout End ============= -->



    @endif





    {{-- common js --}}
    <script src="{{  asset('assets/js/common-bundle-script.js')}}"></script>
    {{-- page specific javascript --}}
    @yield('page-js')

    {{-- theme javascript --}}
    {{-- <script src="{{mix('assets/js/es5/script.js')}}"></script> --}}
    <script src="{{asset('assets/js/script.js')}}"></script>


    @if ($layout=='compact')
    <script src="{{asset('assets/js/sidebar.compact.script.js')}}"></script>


    @elseif($layout=='normal')
    <script src="{{asset('assets/js/sidebar.large.script.js')}}"></script>


    @elseif($layout=='horizontal')
    <script src="{{asset('assets/js/sidebar-horizontal.script.js')}}"></script>


    @else
    <script src="{{asset('assets/js/sidebar.large.script.js')}}"></script>

    @endif



    <script src="{{asset('assets/js/customizer.script.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/pickadate/picker.date.js')}}"></script>
    <script src="{{asset('assets/js/modal.script.js')}}"></script>
    <script src="{{asset('assets/js/numeral.min.js')}}"></script>
    <script src="{{asset('assets/js/cleave.min.js')}}"></script>
    <script src="{{asset('assets/js/cleave.js')}}"></script>

    {{-- bộ thư viện jQuery Validate Plugin 1.19.5 --}}
    <script src="{{asset('assets/js/validatior_plugin/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/validatior_plugin/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/validatior_plugin/messages_vi.js')}}"></script>
    <script>
        // Cài đặt Cleave.js vào tất cả các thẻ input có type="money"
        document.querySelectorAll('input[type="money"]').forEach(function(input) {
            const cleave = new Cleave(input, {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });

            input.addEventListener('blur', function(e) {
                if (e.target.value === '') {
                    cleave.setRawValue(0);
                }
            });
        });

        // Lắng nghe sự kiện submit của form để lấy giá trị đúng của input[type="money"] là số chứ không phải chuỗi
        var formSubmit = document.querySelector('form');
        if(formSubmit){
            document.querySelector('form').addEventListener('submit', function() {
                // Lấy tất cả các thẻ input có type="money"
                let moneyInputs = document.querySelectorAll('input[type="money"]');

                // Với mỗi input, thay thế giá trị hiện tại bằng rawValue
                moneyInputs.forEach(function(input) {
                    // input.value = input.cleave.getRawValue();
                    input.value = parseInt(input.value.replace(/,/g, ''), 10);
                });
            });
        }

    </script>
    {{-- laravel js --}}
    {{-- <script src="{{mix('assets/js/laravel/app.js')}}"></script> --}}
    @yield('bottom-js')
</body>

</html>
