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
                        <a href="/admin/category">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Category
                        </a>
                    </li>
                    <li class="active">Delete Category</li>
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
                       Confirm Deleting Categories
                    </h3>
                    <span class="pull-right">
                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                    </span>
                </div>
                <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary filterable">
                                    <div class="panel-body">
                                        <table class="table table-striped table-responsive" id="table1">
                                            @if ($category->count())
                                            <thead>
                                                @foreach ($category as $view)
                                                    @if (!empty($view))
                                                        
                                                            <tr>
                                                                <th>{{$view->title}}</th>
                                                            </tr>
                                                        
                                                    @endif
                                                @endforeach
                                                </thead>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="panel-body">
                    {!! Form::open(array('method' => 'post')) !!}
                    <div class="form-inline">
                    <div class="form-group">
                        {!! Form::submit('Delete', 
                          array('class'=>'btn btn-primary')) !!}
                    </div>
                    <div class="form-group">
                        <a href="/admin/category">Cancel</a>
                    </div>
                    </div>
                    {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@stop
@section('header_styles')
<style type="text/css">
    .panel-primary {
        border-color: white !important;
    }
</style>
@stop