@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<div class="container">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <h2>Add new Team</h2>
  <form action="{{ url('/team/updateteam/') }}/{{$team->id}}">
    <div class="form-group">
      <label for="Name">Team Name:</label>
      <input type="text" class="form-control" id="name" value="{{$team->name}}" name ='name' placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" class="form-control" id="description" value="{{$team->description}}" name="description" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection
