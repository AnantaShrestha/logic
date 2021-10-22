@extends($ADMINTEMPLATEROOT.'layouts.default')
@php
	$url=(isset($menu) && !empty($menu)) ? route('menu.update',['id'=>$menu['id']]) : route('menu.store');
@endphp
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">List Of Menu</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive" >
						<div class="row">
							<div class='col-lg-6'>
								@include($ADMINTEMPLATEROOT.'menu.form')
							</div>
							<div class="col-lg-6"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@php
@endphp
@push('scripts')

@endpush