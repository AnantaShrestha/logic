<div class="basic-form">
	{!! Form::open(['url' => $url,'class'=>'form-data']) !!}
		<div class="form-group">
			{!! Form::label('parent', 'Parent') !!}
			{!! Form::select('parent_id',[''=>'Select Parent','0'=>'Root'] + $getTreeMenu,(isset($menu)) ? $menu->parent_id : old('parent_id'),['class'=>'form-control','data-validation'=>'required']) !!}
			@if ($errors->has('parent_id'))
			<span class="text-danger">{{ $errors->first('parent_id') }}</span>
			@endif
		</div>
		<div class="form-group">
			{!! Form::label('title','Title') !!}
			{!! Form::text('title',old('title',(isset($menu)) ? $menu->title : ''),['class'=>'form-control','placeholder'=>'Title','data-validation'=>'required']) !!}
			@if ($errors->has('title'))
			<span class="text-danger">{{ $errors->first('title') }}</span>
			@endif
		</div>
		<div class="form-group">
			{!! Form::label('icon','Icon') !!}
			{!! Form::text('icon',old('title',(isset($menu)) ? $menu->icon : ''),['class'=>'form-control icp icp-auto','placeholder'=>'Select Icon']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('url','Url') !!}
			{!! Form::select('uri',[''=>'Select Url'] + $urlList,(isset($menu)) ? $menu->uri : old('uri'),['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">{{(isset($menu)) ? 'Update Menu' : 'Create Menu'}}</button>
				{!! Form::close() !!}
		</div>
	{!! Form::close() !!}
</div>