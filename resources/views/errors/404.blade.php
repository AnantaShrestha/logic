<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>404 Not Found</title>
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/error.css')}}">
</head>
<body>
	<div id="clouds">
		<div class="cloud x1"></div>
		<div class="cloud x1_5"></div>
		<div class="cloud x2"></div>
		<div class="cloud x3"></div>
		<div class="cloud x4"></div>
		<div class="cloud x5"></div>
	</div>
	<div class='c'>
		<div class='_404'>404</div>
		<hr>
		<div class='_1' style="margin-top:30px">THE PAGE</div>
		<div class='_2' style="margin-top:30px">WAS NOT FOUND</div>
		<a class='btn' href='{{request()->is("admin/*") && auth()->check() ? route("admin.index") : url("/") }}' style="margin-top:30px">BACK TO HOMEPAGE</a>
	</div>
</body>
</html>