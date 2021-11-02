@extends($ADMINTEMPLATEROOT.'layouts.default')
@php
	$url=(isset($role)) ? route('role.update',['id'=>$role['id']]) : route('role.store');
@endphp
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">{{(isset($role) && empty($role)) ? 'Create Role' : 'Edit Role'}}</h4>
		</div>
		<div class="card-body">
			<div class="basic-form">
				{!! Form::open(['url' => $url,'class'=>'form-data']) !!}

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('name', 'Role Name') !!}
						{!! Form::text('name',old('name',$role['name'] ?? ''),['class'=>'form-control','placeholder'=>'Role Name','data-validation'=>'required']) !!}
						@if ($errors->has('name'))

						<span class="text-danger">{{ $errors->first('name') }}</span>

						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('slug', 'Role Slug') !!}
						{!! Form::text('slug',old('slug',$role['slug'] ?? ''),['class'=>'form-control','placeholder'=>'Role Slug']) !!}
					</div>
					<div class="form-group col-md-6">

						{!! Form::label('permission', 'Select Permission') !!}
						{!! Form::select('permission[]',$permissions,(isset($role)) ? $role->permissions->pluck('id') : old('permission')  ,['class'=>'form-control permission-list','multiple'=>'multiple']) !!}
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('Select User', 'Select User') !!}
						{!! Form::select('user[]',$users,(isset($role)) ? $role->administrators->pluck('id') : old('permission'),['class'=>'form-control user-list','multiple'=>'multiple']) !!}
					</div>

				</div>
				<button type="submit" class="btn btn-primary">{{(isset($role)) ? 'Update Role' : 'Create Role'}}</button>
				@if(isset($role))
					<a href="{{route('role.create')}}" class="btn btn-success">Back to create</a>
				@else
					<a href="{{route('role.index')}}" class="btn btn-success">Back</a>

				@endif
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
	<script>
		$(document).ready(function(){
			  $(".permission-list").select2({
				placeholder: 'Select Permission'			  	
			  });
			   $(".user-list").select2({
				placeholder: 'Select User'			  	
			  });
		});
	</script>
	@include($ADMINTEMPLATEROOT.'scripts.validation')
@endpush