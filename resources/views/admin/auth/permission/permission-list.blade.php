<?php	
	$old_http_uri = old('http_uri',($permission) ? explode(',', $permission->http_uri) : []);
?>
<div class="row">
	@foreach ($routeList as  $key=>$route)
	<div class="col-lg-4">
		<div class="permission-wrapper">
			<h5>{{ucfirst($key)}}</h5>
				@if($key=='admin')
					<p>{!!Form::checkbox('http_uri[]',$route['root_uri'],(in_array($route['root_uri'],$old_http_uri)) ? true : false) !!}<span>Full Permission</span></p>
				@endif
				@if(isset($route['create']))
					<p>{!!Form::checkbox('http_uri[]',$route['create'],(in_array($route['create'],$old_http_uri)) ? true : false) !!}<span>Create {{ucfirst($key)}}</span></p>
				@endif
				@if(isset($route['edit']))
					<p>{!!Form::checkbox('http_uri[]',$route['edit'],(in_array($route['edit'],$old_http_uri)) ? true : false) !!}<span>Edit {{ucfirst($key)}}</span></p>
				@endif
				@if(isset($route['index']))
					<p>{!!Form::checkbox('http_uri[]',$route['index'],(in_array($route['index'],$old_http_uri)) ? true : false) !!}<span>View {{ucfirst($key)}}</span></p>
				@endif
				@if(isset($route['delete']))
					<p>{!!Form::checkbox('http_uri[]',$route['delete'],(in_array($route['delete'],$old_http_uri)) ? true : false) !!}<span>Delete {{ucfirst($key)}}</span></p>
				@endif
		</div>
	</div>
	@endforeach
</div>