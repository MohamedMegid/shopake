			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>Orders</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Orders</li>
                </ol>
            @stop
            <!--section ends-->
            @section('content')
            	<div class="row">
				    <div class="col-md-12">
				        <div class="panel panel-success" id="hidepanel1">
				                <div class="panel-heading">
				                    <h3 class="panel-title">
				                    <i class="fa fa-fw fa-filter"></i>
				                        Search Orders
				                    </h3>
				                    <span class="pull-right">
				                        <i class="glyphicon glyphicon-chevron-up clickable"></i>
				                        <i class="glyphicon glyphicon-remove removepanel clickable"></i>
				                    </span>
				                </div>
				                <div class="panel-body">
					                {!! Form::open(array('method' => 'post', 'class' => 'form-inline')) !!}
						            
					            		<div class="form-group">
					                        <label class="control-label">
					                            Client Name
					                        </label>
					                        <input name="name" type="text" class="form-control" style="width: 450px !important;" @if (!empty($_GET['name']))  value="{{$_GET['name']}}" @endif>
					                    </div>
					                    <div class="form-group">
					                        <input type="submit" name="search" value="Search" class="button button-pill button-flat" style="padding: 5px;">
					                    </div>
	                			</div>
	                	</div>
	                </div>
	            </div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                    	<i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    	List Orders
                                	</div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($order->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="">
                                                </th>
                                                <th>Code</th>
                                                <th>Name</th>
	                                            <th>E-mail</th>
	                                            <th>Address</th>
	                                            <th>Mobile</th>
	                                            <th>Category</th>
	                                            <th>Quantity</th>
	                                            <th>Total Cost</th>
	                                            <th>Created At</th>
	                                            <th>
	                                                Delete
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($order as $view)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->name}}</td>
                                                <td>{{$view->mail}}</td>
                                                <td>{{$view->address}}</td>
                                                <td>{{$view->mobile}}</td>
                                                @foreach ($category as $cat)
                                                	@if ($view->category_id == $cat->id)
                                                		<td>{{$cat->title}}</td>
                                                	@endif
                                                @endforeach
                                                <td>{{$view->quantity}}</td>
                                                <td>{{$view->total_cost}}</td>
                                                <td>
	                                               {{$view->created_at}}
                                                </td>
	                                            <td>
	                                                <a href="/admin/order/{{$view->id}}/delete"><i class="fa fa-trash-o"></i>Delete</a><br>
	                                                <a href="/admin/order/{{$view->id}}/print"><i class="fa fa-print"></i>Print</a><br>
	                                                <a href="/admin/order/{{$view->id}}/details"><i class="fa fa-list"></i>Details</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($order->count()))
	                                	<div class="text-center"><h1>There is No result</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if ($order->count())
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> Total : {{ $order->count() }} Orders </div>
                            </div>
                        </div>
                    </div>
                </div>           
                {!! Form::close() !!}
                <div class="row">
	                <div class="col-md-12">
	                    <div class="product-pagination text-center">
	                        <nav>
	                            <ul class="pagination">
	                                {!! $order->render() !!}
	                            </ul>
	                        </nav>                        
	                    </div>
	                </div>
	            </div>
   				@stop
   				@section('header_styles')
   				@stop
   				@section('footer_scripts')
                	<script>
						    $('#checkall').change(function(event) {
						        if(this.checked) {
						            $('.check_list').each(function() {
						                this.checked = true;
						            });
						        }
						        else{
						            $('.check_list').each(function() {
						                this.checked = false;
						            });        
						        }
						    });
					</script>    
					  </script>
   				@stop