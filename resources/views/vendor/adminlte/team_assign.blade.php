@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Assign teams</div>

					<div class="panel-body">
					<form name='assign-teams'>
					  <div class="">
						<select class="form-control form-control-sm" id='teams' name='teams'>
						  <option>Small select</option>
						  <option>Small select</option>
						  <option>Small select</option>
						</select>
					  </div>
					  <div class="">
						<select class="form-control form-control-sm" id='members' name='members'> 
						  <option value="1">Small select</option>
						  <option value="2">Small select</option>
						  <option value="3">Small select</option>
						</select>
					  </div>
					  
					  <button type="submit" class="btn btn-default">Submit</button>
					</form>
					
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
