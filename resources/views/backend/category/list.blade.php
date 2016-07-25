			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>Categories</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Categories</li>
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
				                        Search Categories
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
					                            Title
					                        </label>
					                        <input name="title" type="text" class="form-control" style="width: 450px !important;" @if (!empty($_GET['title']))  value="{{$_GET['title']}}" @endif>
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
                                    	List Categories
                                	</div>
                                    
                                </div>
                                <div class="tools pull-right"></div>

                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-responsive" id="table1">
                                	@if ($category->count())
	                                    <thead>
	                                        <tr>
	                                        	<th>
                                                    <input type="checkbox" name="check_all" id="checkall" style="">
                                                </th>
                                                <th>Code</th>
                                                <th>Title</th>
	                                            <th>Quantity</th>
	                                            <th>Price</th>
	                                            <th>Created At</th>
	                                            <th>Updated At</th>
	                                            <th>
	                                                Operations
	                                            </th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
                                    	@foreach ($category as $view)
	                                        <tr>
	                                        	<td>
                                                    <input type="checkbox" name="check_list[{{$view->id}}]" class="check_list" value="{{$view->id}}">
                                                </td>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->title}}</td>
                                                <td>{{$view->quantity}}</td>
                                                <td>{{$view->price}}</td>
                                                <td>
	                                               {{$view->created_at}}
                                                </td>
                                                <td>
	                                               {{$view->updated_at}}
                                                </td>
	                                            <td>
	                                                <a href="/admin/category/{{$view->id}}/edit"><i class="fa fa-fw fa-edit"></i>Edit</a><br> 
	                                                <a href="/admin/category/{{$view->id}}/delete"><i class="fa fa-trash-o"></i>Delete</a>
	                                            </td>
	                                        </tr>
	                                    @endforeach
	                                @endif
	                                @if (!($category->count()))
	                                	<div class="text-center"><h1>There is No result</h1> </div>
	                                @endif
                                    </tbody>
                                </table>
                                @if ($category->count())
		                            <div class="form-group">
		                                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
		                            </div>
		                        @endif
                                <div> <i class="fa fa-folder-o"></i> Total : {{ $category->count() }} Category </div>
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
	                                {!! $category->render() !!}
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