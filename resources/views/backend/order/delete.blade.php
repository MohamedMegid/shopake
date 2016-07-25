@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>Delete Category</h1>
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
                    <li class="active">Delete Order</li>
                </ol>
            @stop
            <!--section ends-->
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Confirm deleting Order: {{$order->name}}
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('method' => 'post')) !!}
                    <div class="form-inline">
                    <div class="form-group">
                        {!! Form::submit('Delete', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        <a href="/admin/order">Cancel</a>
                    </div>
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@stop