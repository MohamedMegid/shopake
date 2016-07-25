<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
      @import url(http://fonts.googleapis.com/css?family=Bree+Serif);
      body, h1, h2, h3, h4, h5, h6{
      font-family: 'Bree Serif', serif;
      }
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1>
            <a href="https://twitter.com/tahirtaous">
            <img src="/assets/frontend/coming/images/logo1.png" style="width: 100px;">
          	<h1><small>Date :{{$today}}</small></h1>
            </a>
          </h1>
        </div>
        <div class="col-xs-6 text-right">
          <h1>INVOICE</h1>
          <h1><small>Invoice #{{$order->id}}</small></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-5">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>From: <a href="#">Shopake</a></h4>
            </div>
            <div class="panel-body">
              <p>
                Support: info@shopake.com <br>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 text-right">
          <div class="panel panel-default">
            <div class="panel-heading" style="width: 100% !important;text-align: left;">
              <h4>To : <a href="#">{{$order->name}}</a></h4>
            </div>
            <div class="panel-body">
              <p style="text-align:left;">
                Address: {{$order->address}} <br>
                Mobile: {{$order->mobile}} <br>
                E-mail: {{$order->mail}} <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <table class="table table-bordered">
        <thead style="background-color: #F5F5F5;">
          <tr>
            <th>
              <h4>Product</h4>
            </th>
            <th>
              <h4>Quantity</h4>
            </th>
            <th>
              <h4>Rate/Price</h4>
            </th>
            <th>
              <h4>Sub Total</h4>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
          @foreach ($category as $item)
          	@if ($item->id == $order->category_id)
            	<td>{{$item->title}}</td>
            @endif
          @endforeach
            <td><a href="#">{{$order->quantity}}</a></td>
          @foreach ($category as $item)
          	@if ($item->id == $order->category_id)
            	<td>{{$item->price}}</td>
            	<?php $price = $item->price; ?>
            @endif
          @endforeach
            <td class="text-right">{{$order->quantity * $price}}</td>
          </tr>
        </tbody>
      </table>
      <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
          <p>
            <strong>
            Total : <br>
            </strong>
          </p>
        </div>
        <div class="col-xs-2">
          <strong>
          {{$order->quantity * $price}}<br>
          </strong>
        </div>
      </div>
    </div>
  </body>
</html>