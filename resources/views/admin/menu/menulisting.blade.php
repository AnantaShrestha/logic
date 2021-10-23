@foreach($menus[0] as $menu)
	<li class="dd-item " data-id="{{ $menu->id }}">
		<div class="dd-handle header-fix " style="">
			{!! $menu->title !!}
			<span class="float-right dd-nodrag">
				<a href="{{route('menu.edit',['id'=>$menu->id])}}"><i class="fa fa-edit"></i></a>
				&nbsp; 
				<a href="{{route('menu.delete',['id'=>$menu->id])}}" data-id="{{ $menu->id }}" class="remove_menu"><i class="fa fa-trash"></i></a>
			</span>
		</div>
		 @if (isset($menus[$menu->id]) && count($menus[$menu->id]))
	      @include($ADMINTEMPLATEROOT.'menu.submenulist',['menu'=>$menu])
	    @endif
	</li>
@endforeach