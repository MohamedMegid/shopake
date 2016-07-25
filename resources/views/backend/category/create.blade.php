			@extends('backend.master')
            @section('content-header')
                <!--section starts-->
                <h1>Add Category</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/category">Categories</a>
                    </li>
                    <li class="active">Add Category</li>
                </ol>
            @stop
            <!--section ends-->
            @section('content')
                <!--main content-->
            <div class="row">
			    <div class="col-md-12">
			         <div class="panel panel-primary" id="hidepanel1">
			                            <div class="panel-heading">
			                                <h3 class="panel-title">
			                                    <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
			                                    Add Category
			                                </h3>
			                                <span class="pull-right">
			                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
			                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
			                                </span>
			                            </div>
			                <div class="panel-body">
			                    {!! Form::open(array('method' => 'post', 'files'=>true)) !!}
			                        <div class="form-group">
			                          <label>Title</label><br>
			                          <input type="text" class="form-control" placeholder="title" name="title" />
			                        </div>
			                        
			                        <div class="form-group">
			                          <label>Quantity</label><br>
			                          <input type="text" class="form-control" placeholder="Quantity" name="quantity" />
			                        </div>

			                        <div class="form-group">
			                          <label>Price</label><br>
			                          <input type="text" class="form-control" placeholder="price" name="price" />
			                        </div>
			                        
			                        <div class="form-group">
			                            {!! Form::submit('Save', 
			                              array('class'=>'btn btn-primary')) !!}
			                        </div>
			                    {!! Form::close() !!}
			                </div>
			        </div>
			    </div>
			</div>
                <!--main content ends-->
                @stop
                @section('footer_scripts')
				@stop
            	@section('header_styles')
				@stop