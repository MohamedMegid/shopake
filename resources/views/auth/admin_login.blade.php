<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href=" {{asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{asset('assets/backend/css/pages/login2.css') }}" rel="stylesheet" />
    <link href="{{asset('assets/backend/vendors/iCheck/skins/minimal/blue.css') }}" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#286090;color:white;">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <img src="/img/lock.png" style="width: 40px;height: 30px;float: right;">
                                <h3 class="panel-title text-center" style="text-align: right;">Login</h3>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        {!!Form::open(['url'=>'admin/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
                            <fieldset>
                            @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group input-group">
                                    {!! Form::text('email',Input::old('email'),['class'=>'form-control', 'placeholder'=> 'E-mail']) !!}
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="at" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>
                                </div>
                                <div class="form-group input-group">
                                    {!! Form::password('password',['class'=>'form-control', 'placeholder'=> 'Password']) !!}
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>
                                </div>
                                <div class="form-group" style="direction:rtl;">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" class="minimal-blue">
                                        Remember me
                                    </label>
                                </div>
                                {!!Form::submit('Login',['class'=>'btn btn-lg btn-primary btn-block'])!!}
                            </fieldset>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{asset('assets/backend/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/backend/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{asset('assets/backend/vendors/livicons/minified/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('assets/backend/vendors/livicons/minified/livicons-1.4.min.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="{{asset('assets/backend/js/TweenLite.min.js') }}"></script>
    <script src="{{asset('assets/backend/vendors/iCheck/icheck.js') }}" type="text/javascript"></script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).mousemove(function(event) {
            TweenLite.to($('body'), .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });
    </script>
    <style type="text/css">
    input.form-control{
    	direction: rtl;
    }
    .panel-body{
    	margin: -40px 4px 4px;
	}
    div.alert.alert-danger{
        direction: rtl;
    }
    </style>
    <!-- end of page level js-->
</body>
</html>