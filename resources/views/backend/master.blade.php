<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Shopake Order</title> 
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/icon" href="{{ asset('assets/frontend/assets/images/logo1.png') }}"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    @yield('autocomplete')
    @yield('header_styles')
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('assets/backend/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ asset('assets/backend/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global css -->
    <!--page level css -->
    <!-- daterange picker -->
    <link href="{{ asset('assets/backend/vendors/daterangepicker/css/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!--select css-->
    <link href="{{ asset('assets/backend/vendors/select2/select2.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/backend/vendors/select2/select2-bootstrap.css') }}" />
    <!--clock face css-->
    <link href="{{ asset('assets/backend/vendors/iCheck/skins/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/backend/css/styles/styles.css') }}" rel="stylesheet" />
    <!-- Arabic version (rtl) -->
    @if(Lang::getLocale() == 'ar')
        <link href="{{ asset('assets/backend/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    @endif
    <!--end of page level css-->
</head>
<body class="skin-josh">
    @include('backend.regions.header')
    <div class="wrapper row-offcanvas row-offcanvas-left">
        @include('backend.regions.sidebar')
        <section class="content">
                    <!-- Right side column. Contains the navbar and content of the page -->
                <aside class="right-side">
                     <!-- Content Header (Page header) -->
                    <section class="content-header">
                        @yield('content-header')
                    </section>
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @include('backend.blocks.message')
                            </div>
                        </div>
                        @yield('content')
                    </section>
                </aside>             
        </section>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!--livicons-->
    <script src="{{ asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/vendors/holder-master/holder.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="{{ asset('assets/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <!-- end of page level js -->
    <script src="{{ asset('assets/backend/js/more/add_more.js') }}"></script>
    @yield('footer_scripts')
    @yield('autocomplete_scripts')
</html>