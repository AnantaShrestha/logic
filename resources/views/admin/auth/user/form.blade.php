@extends($ADMINTEMPLATEROOT.'layouts.default')
@php
	$url=(isset($user)) ? route('user.update',['id'=>$user['id']]) : route('user.store');
@endphp
@section('content')

<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">{{(isset($user) && empty($user)) ? 'Create User' : 'Edit User'}}</h4>
		</div>
		<div class="card-body">
			<div class="basic-form">
				{!! Form::open(['url' => $url,'class'=>'form-data']) !!}
				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('name', 'Full Name') !!}
						{!! Form::text('name',old('name',$user['name'] ?? ''),['class'=>'form-control','placeholder'=>'Full Name','data-validation'=>'required|string']) !!}
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('username', 'Username') !!}
						{!! Form::text('username',old('username',$user['username'] ?? ''),['class'=>'form-control','placeholder'=>'Username','data-validation'=>'required']) !!}
						@if ($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('email', 'Email') !!}
						{!! Form::email('email',old('email',$user['email'] ?? ''),['class'=>'form-control','placeholder'=>'Email','data-validation'=>'required|email']) !!}
						@if ($errors->has('email'))
							<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('avatar', 'Avatar') !!}
						{!! Form::file('avatar',['class'=>'form-control']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('password','Password') !!}
						{!! Form::password('password',['class'=>'form-control','placeholder'=>'Password','data-validation'=>(isset($user)) ? '' : 'required|confirm']) !!}
						@if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('confirm','Confirmation') !!}
						{!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirmation','data-validation'=>(isset($user)) ? '' : 'required']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('roles','Select Roles') !!}
						{!! Form::select('role[]',$roles,(isset($user)) ? $user->roles->pluck('id') : old('roles')  ,['class'=>'form-control role-list','multiple'=>'multiple']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('permission', 'Select Permission') !!}
						{!! Form::select('permission[]',$permissions,(isset($user)) ? $user->permissions->pluck('id') : old('permission')  ,['class'=>'form-control permission-list','multiple'=>'multiple']) !!}
					</div>
				</div>
				<button type="submit" class="btn btn-primary">{{(isset($user)) ? 'Update User' : 'Create User'}}</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
@push('style')
	<link rel="stylesheet" type="text/css" href="{{asset('admin/vendor/select2/css/select2.min.css')}}">
@endpush
@push('scripts')
	<script src="{{asset('admin/vendor/select2/js/select2.full.min.js')}}"></script>
	@include($ADMINTEMPLATEROOT.'scripts.validation')
	<script>
		$(document).ready(function(){
			  $(".role-list").select2({
				placeholder: 'Select Role'			  	
			  });
			   $(".permission-list").select2({
				placeholder: 'Select Permission'			  	
			  });
		});
	</script>
@endpush