<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Shopake</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('assets/frontend/assets/images/logo1.png') }}"/>
    <!-- Font Awesome -->
    <link href="{{ asset('assets/frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/assets/css/slick.css') }}"/> 
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/jquery.fancybox.css') }}" type="text/css" media="screen" /> 
    <!-- Animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/assets/css/animate.css') }}"/>  
     <!-- Theme color -->
    <link id="switcher" href="{{ asset('assets/frontend/assets/css/theme-color/default.css') }}" rel="stylesheet">

    <!-- Main Style -->
    <link href="{{ asset('assets/frontend/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Raleway for Title -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- Pacifico for 404 page   -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    input.btn.btn-default{
      background-color: #252928;
      color: #eee;
    }
    .scrollToTop:hover, .scrollToTop:focus {
      background-color: #eee;
    }
    .scrollToTop {
      color: #252928;
    }
    </style>
  </head>
  <body>

  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start Contact section -->
  <section id="contact">
    <div class="container">

  <div class="row">
                            <div class="col-md-12">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger" style="color: #43D568;background-color: #DEF2E2;">
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
      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
         <nav class="navbar navbar-default main-navbar" role="navigation" style="background-color: rgba(255, 255, 255, 0.5);">  
                <div class="container">
                  <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <!-- LOGO -->                                               
                     <a class="navbar-brand logo" href="/shopake/order"><img src="{{ asset('assets/frontend/assets/images/logo1.png') }}" alt="logo" style="margin-left: 125px;"></a>                      
                  </div>     
                </div>          
              </nav>
          <div class="contact-left wow fadeInLeft">

            <h2>Contact us</h2>
            <!--
             <address class="single-address">
              <h4>Address:</h4>
              <p>Down Town, Cairo</p>
            </address>
             <address class="single-address">
              <h4>Phone</h4>
              <p>Phone Number: </p>
            </address>
            -->
             <address class="single-address">
              <h4>E-Mail</h4>
              <p>Support: info@shopake.com</p>
            </address>
          </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
          <div class="contact-right wow fadeInRight">
            <h2>Order</h2>
              {!! Form::open(array('method' => 'post')) !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">                
                <input type="text" class="form-control" placeholder="Name" name="name">
              </div>
              <div class="form-group">                
                <input type="text" class="form-control" placeholder="Address" name="address">
              </div> 
              <div class="form-group">                
                <input type="email" class="form-control" placeholder="Enter Email" name="mail">
              </div>              
              <div class="form-group">                
                <input type="text" class="form-control" placeholder="Mobile" name="mobile">
              </div>
              <div class="form-group">
                <label style="color: rgb(225, 225, 225);">Category</label>
                <select name="category" class="form-control">
                @if ($category->count())
                @foreach($category as $view)
                  <option value="{{$view->id}}" @if ($category_id != 0) @if ($category_id == $view->id) selected @endif @endif >
                    {{$view->title}}
                  </option>
                @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label style="color: rgb(225, 225, 225);">Quantity</label>
                <select name="quantity" class="form-control">
                  <option value="">-- choose --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="form-group" style="display:none;">                
                <input type="text" class="form-control" placeholder="Total Cost" name="total_cost">
              </div>
              <div class="form-group">
                <label style="color: rgb(225, 225, 225);">Comment</label><br>
                <textarea rows="4" cols="50" class="form-control" name="comment"></textarea>
              </div>
              <div class="form-group">
                {!! Form::submit('Save', 
                    array('class'=>'btn btn-default')) !!}
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->

  <!-- Start Footer -->    
  <footer id="footer">
  <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer-top-area">             
              <div class="footer-social">
                <a class="facebook" href="#"><span class="fa fa-facebook"></span></a>
                <a class="twitter" href="#"><span class="fa fa-twitter"></span></a>
                <a class="google-plus" href="#"><span class="fa fa-google-plus"></span></a>
                <a class="youtube" href="#"><span class="fa fa-youtube"></span></a>
                <a class="linkedin" href="#"><span class="fa fa-linkedin"></span></a>
                <a class="dribbble" href="#"><span class="fa fa-dribbble"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- 
    <div class="footer-bottom">
      <p>Powered by <a href="http://hashtagadvertising.net/index.html"><img src="{{ asset('assets/frontend/assets/images/logo.png') }}" alt="HashTag Advertising"> HashTag Advertising</a></p>
    </div> -->
  </footer>
  <!-- End Footer -->

  <!-- initialize jQuery Library --> 
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <!-- Bootstrap -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery-1.11.3.min.js') }}"></script>
  <script src="{{ asset('assets/frontend/assets/js/bootstrap.js') }}"></script>
  <!-- Slick Slider -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/slick.js') }}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/waypoints.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery.counterup.js') }}"></script>
  <!-- mixit slider -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery.mixitup.js') }}"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/jquery.fancybox.pack.js') }}"></script>
  <!-- Wow animation -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/wow.js') }}"></script> 

  <!-- Custom js -->
  <script type="text/javascript" src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script>
    
  </body>
</html>