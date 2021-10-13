@extends($ADMINTEMPLATEROOT.'layouts.default')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">List Of Permission</h4>
				</div>
				<div class="card-body">
					<div class="search-box">
						<input id="dataTableSearch" type="text" class="form-control" name="search" placeholder="Search">
					</div>
					<div class="table-responsive" >
						<table class="table table-responsive-sm custom-datatable">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Permission Name</th>
									<th class="width-50">List of Permission</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="table-data">
								@include($ADMINTEMPLATEROOT.'auth.permission.table-listing')
						   </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@php
$url=route("permission.pagination");
@endphp
@push('scripts')
@include($ADMINTEMPLATEROOT.'scripts.dataTable')
@endpush