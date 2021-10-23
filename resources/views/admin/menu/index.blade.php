@extends($ADMINTEMPLATEROOT.'layouts.default')
@php
$url=(isset($menu)) ? route('menu.update',['id'=>$menu['id']]) : route('menu.store');
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
					<div class="row">
						<div class='col-lg-6'>
							<div class="dd" id="menu-sort">
         						<ol class="dd-list">
         							@include($ADMINTEMPLATEROOT.'menu.menulisting')
         						</ol>
         					</div>
         					<div class="menu-save-button">
         						<a class="btn btn-success btn-flat menu-sort-save" title="Save"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;Save</span></a>
         					</div>
						</div>
						<div class="col-lg-6">
							@include($ADMINTEMPLATEROOT.'menu.form')
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	@endsection
	@php
	@endphp
	@push('style')
	<link rel="stylesheet" type="text/css" href="{{asset('admin/vendor/nestable2/css/jquery.nestable.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('admin/vendor/iconpicker/css/fontawesome-iconpicker.min.css')}}">

	@endpush
	@push('scripts')
		<script src="{{asset('admin/vendor/nestable2/js/jquery.nestable.min.js')}}"></script>
		<script src="{{asset('admin/vendor/iconpicker/js/fontawesome-iconpicker.js')}}"></script>
		@include($ADMINTEMPLATEROOT.'scripts.validation')
		@include($ADMINTEMPLATEROOT.'scripts.adminmenuscript')
	@endpush