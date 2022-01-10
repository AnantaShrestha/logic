@extends($ADMINTEMPLATEROOT.'layouts.default')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Mail Setting</h4>
		</div>
		<div class="card-body">
			<div class="basic-form">
				{!! Form::open(['url' =>route('mailsetting.store'),'class'=>'form-data']) !!}
				<div class="form-row">
					<div class="form-group col-md-6">
						{!! Form::label('driver', 'Driver') !!}
						{!! Form::text('driver',old('driver',$mail['driver'] ?? ''),['class'=>'form-control','placeholder'=>'Driver','data-validation'=>'required']) !!}
						@if ($errors->has('driver'))
							<span class="text-danger">{{ $errors->first('driver') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('host', 'Host') !!}
						{!! Form::text('host',old('host',$mail['host'] ?? ''),['class'=>'form-control','placeholder'=>'Host','data-validation'=>'required']) !!}
						@if ($errors->has('host'))
							<span class="text-danger">{{ $errors->first('host') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('post', 'Port') !!}
						{!! Form::text('port',old('port',$mail['port'] ?? ''),['class'=>'form-control','placeholder'=>'Port','data-validation'=>'required']) !!}
						@if ($errors->has('port'))
							<span class="text-danger">{{ $errors->first('port') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('encryption', 'Encryption') !!}
						{!! Form::select('encryption',[''=>'Select Encryption','tls'=>'TLS','ssl'=>'SSL'],(isset($mail)) ? $mail->encryption : old('encryption'),['class'=>'form-control']) !!}
						@if ($errors->has('encryption'))
							<span class="text-danger">{{ $errors->first('encryption') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('username', 'Username') !!}
						{!! Form::text('username',old('username',$mail['username'] ?? ''),['class'=>'form-control','placeholder'=>'Username','data-validation'=>'required']) !!}
						@if ($errors->has('username'))
							<span class="text-danger">{{ $errors->first('username') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('password', 'Password') !!}
						{!! Form::text('password',old('password',$mail['password'] ?? ''),['class'=>'form-control','placeholder'=>'Password','data-validation'=>'required']) !!}
						@if ($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name',old('name',$mail['name'] ?? ''),['class'=>'form-control','placeholder'=>'Name','data-validation'=>'required']) !!}
						@if ($errors->has('name'))
							<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						{!! Form::label('address', 'Email Address') !!}
						{!! Form::text('address',old('address',$mail['address'] ?? ''),['class'=>'form-control','placeholder'=>'Email Address','data-validation'=>'required']) !!}
						@if ($errors->has('address'))
							<span class="text-danger">{{ $errors->first('address') }}</span>
						@endif
					</div>


				</div>
				<button type="submit" class="btn btn-primary">{{(isset($mail)) && !empty($mail) ? 'Update' : 'Create'}}</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
	@include($ADMINTEMPLATEROOT.'scripts.validation')
@endpush