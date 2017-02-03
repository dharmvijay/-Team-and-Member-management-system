@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container">
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

  <h2>Members</h2> <a href='/members/create'>Add new Member</a>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
	@foreach($members as $memberKey => $memberValue)
		
      <tr>
        <td>{{ $memberValue->name }}</td>
        <td>{{ $memberValue->email }}</td>
        <td><a href='/members/<?php echo $memberValue->id ?>/edit'>Edit</a>/<a href='member/destroy/<?php echo $memberValue->id ?>'>Delete</a></td>
      </tr>
	@endforeach
      
    </tbody>
  </table>
</div>
@endsection
