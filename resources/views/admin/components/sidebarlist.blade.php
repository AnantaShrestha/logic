 @foreach($menus[$menu->id] as $menu)
  <li>
    <a class="{{empty($menu->uri) ? 'has-arrow' : ''}}" href="{{empty($menu->uri) ? 'javascript:void()' : url($menu->uri) }}" aria-expanded="false">
        <i
        class=" {{!empty('$menu->icon') ? $menu->icon : ''}}"></i><span class="nav-text">{{$menu->title}}</span></a>
    @if(isset($menus[$menu->id]) && count($menus[$menu->id]))
        <ul aria-expanded="false">
            @include($ADMINTEMPLATEROOT.'components.sidebarlist',['menu'=>$menu])
        </ul>
    @endif
</li>
@endforeach