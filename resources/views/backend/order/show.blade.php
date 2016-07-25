@extends('backend.master')
@section('header')
 <link href="{{ asset('assets/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.1.0.css') }}" />
@endsection
@section('content-header')
<h1>Orders Details</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/order">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Order
                        </a>
                    </li>
                    <li class="active">Orders Details</li>
                </ol>
@endsection

@section('content')
<div class="row">
     <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="livicon" data-name="phone" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>Order Details</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td><b>Name:</b></td>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>E-mail:</b></td>
                                        <td>{{ $order->mail }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address:</b></td>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mobile:</b></td>
                                        <td>{{ $order->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Category:</b></td>
                                        <td>
                                            @if ($category->count())
                                            @foreach ($category as $cat)
                                            @if ($order->category_id = $cat->id)
                                            {{ $cat->title }}
                                            @endif
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Quantity:</b></td>
                                        <td>{{ $order->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Total Price:</b></td>
                                        <td>{{ $order->total_cost }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Comment:</b></td>
                                        <td>{{ $order->comment}} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Created at:</b></td>
                                        <td>{{ $order->created_at}} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection