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
					<div class="table-responsive">
						<table class="table table-responsive-sm custom-datatable">
							<thead>
								<tr>
									<th>S.No</th>
									<th>Permission Name</th>
									<th>List of Permission</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@include($ADMINTEMPLATEROOT.'auth.permission.table-listing')
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection