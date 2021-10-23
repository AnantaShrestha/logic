
<ol class="dd-list">
  @foreach ($menus[$menu->id] as $level)
  <li class="dd-item" data-id="{{ $level->id }}">
    <div class="dd-handle">
      {!! $level->title !!}
      <span class="float-right dd-nodrag">
        <a href="{{route('menu.edit',['id'=>$level->id])}}"><i class="fa fa-edit fa-edit"></i></a>
        &nbsp; 
        <a data-id="{{ $level->id }}" class="remove_menu"><i class="fa fa-trash fa-edit"></i></a>
      </span>
    </div>
    @if (isset($menus[$level->id]) && count($menus[$level->id]))
      @include($ADMINTEMPLATEROOT.'menu.submenulist',['menu'=>$level])
    @endif
  </li>
  @endforeach
</ol>
