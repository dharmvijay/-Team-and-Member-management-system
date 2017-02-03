@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
<div class="container">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <h2>Teams</h2> <a href='/teams/create'>Add new Team</a>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Descriptions</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
	@foreach($teams as $teamKey => $teamValue)
		
      <tr>
        <td>{{ $teamValue->name }}</td>
        <td>{{ $teamValue->description }}</td>
        <td><a href='/teams/<?php echo $teamValue->id ?>/edit'>Edit</a>/<a href='team/destroy/<?php echo $teamValue->id ?>'>Delete</a></td>
      </tr>
	@endforeach
      
    </tbody>
  </table>
</div>
@endsection
