<div class="quixnav">
    <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                @if($menus && !empty($menus))
                 @foreach($menus[0] as $menu)
                    @if($menu->parent_id== 0)
                      <li class="nav-label">{{$menu->title}}</li>
                    @endif
                    @if(isset($menus[$menu->id]) && count($menus[$menu->id]))
                        @include($ADMINTEMPLATEROOT.'components.sidebarlist',['menu'=>$menu])
                    @endif
                 @endforeach  
                @endif
            </ul>
    </div>
</div>