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
  <form action="{{ url('/teams/store') }}">
    <div class="form-group">
      <label for="Name">Team Name:</label>
      <input type="text" class="form-control" id="name" name ='name' placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <input type="text" class="form-control" id="description" name="description" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection
