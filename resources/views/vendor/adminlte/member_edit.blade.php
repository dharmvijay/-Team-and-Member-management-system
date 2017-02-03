@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="container">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <h2>Add new Member</h2>
  
  <form action="{{ url('/member/update/') }}/{{$member->id}}">
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="name" value="{{$member->name}}" name ='name' placeholder="Enter name">
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="text" class="form-control" id="email" value="{{$member->email}}" name="email" placeholder="Enter email">
    </div>
	<div class="form-group">
      <label for="pwd">Assign Teams:</label>
	  @foreach($teams as $teamsKey => $teamsValue)
			<?php if(!empty($team_id) && $teamsValue->id == $team_id->team_id) {  
			
				?>
				<input type="radio" checked name="assign_team" value="{{$teamsValue->id}}">{{$teamsValue->name}}
			<?php  } else { ?>
				<input type="radio" name="assign_team" value="{{$teamsValue->id}}">{{$teamsValue->name}}
			<?php } ?>
				
	  @endforeach
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection
