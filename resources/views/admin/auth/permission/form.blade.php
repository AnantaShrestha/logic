@extends($ADMINTEMPLATEROOT.'layouts.default')
@php
	$url=(isset($permission) && !empty($permission)) ? route('permission.update',['id'=>$permission['id']]) : route('permission.store');
@endphp
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">{{(isset($permission) && empty($permission)) ? 'Create Permission' : 'Edit Permission'}}</h4>
		</div>
		<div class="card-body">
			<div class="basic-form">
				{!! Form::open(['url' => $url,'class'=>'form-data']) !!}

				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('name', 'Permission Name') !!}
						{!! Form::text('name',old('name',$permission['name'] ?? ''),['class'=>'form-control','placeholder'=>'Permission Name','data-validation'=>'required']) !!}
						@if ($errors->has('name'))

						<span class="text-danger">{{ $errors->first('name') }}</span>

						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('slug', 'Permission Slug') !!}
						{!! Form::text('slug',old('slug',$permission['slug'] ?? ''),['class'=>'form-control','placeholder'=>'Permission Slug']) !!}
					</div>
					<div class="form-group col-md-12">
						{!! Form::label('permissions', 'Give Permissions') !!}
						@include($ADMINTEMPLATEROOT.'auth.permission.permission-list')
					</div>

				</div>
				<button type="submit" class="btn btn-primary">{{(isset($permission) && empty($permission)) ? 'Create Permission' : 'Update Permission'}}</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
	@include($ADMINTEMPLATEROOT.'scripts.validation')
@endpush