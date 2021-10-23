<?php	

	$old_http_uri = old('http_uri',(isset($permission)) ? explode(',', $permission->http_uri) : []);
?>
<div class="row">
	@foreach ($routeList as  $rootkey=>$routes)
	<div class="col-lg-4">
		<div class="permission-wrapper">
			<h5>{{ucfirst($rootkey)}}</h5>
				@if($rootkey=='admin')
					<p>{!!Form::checkbox('http_uri[]',$routes['root_uri'],(in_array('/'.$routes['root_uri'],$old_http_uri)) ? true : false) !!}<span>Full Control</span></p>
				@endif
				@foreach($routes as $key=>$route)
					@if($key!='root_uri')
						<p>{!!Form::checkbox('http_uri[]',$route,(in_array($route,$old_http_uri)) ? true : false) !!}<span>{{($key == 'index') ? 'View' : ucfirst($key)}} {{ucfirst($rootkey) }}</span></p>
					@endif
				@endforeach
		</div>
	</div>
	@endforeach
</div>