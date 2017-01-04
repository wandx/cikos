@foreach($roles as $r)
    @foreach($r->menu as $menu)
        @if($menu->sub_menu->count() > 0)
            <li  class ="{{ (Request::segment(2) == $menu->name || $menu->name === 'dashboard') ? 'active' : '' }}">
                <a href="#"><i class="{{$menu->icon}}"></i> <span class="nav-label">{{$menu->display_name}}</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    @foreach($menu->sub_menu as $sub_menu)
                        @if($sub_menu->sub_sub_menu->count() > 0)
                            <li  class ="{{ (Request::segment(3) == $sub_menu->name && Request::segment(2) == $menu->name) ? 'active' : '' }}">
                                <a href="#"><i class="{{$sub_menu->icon}}"></i> <span class="nav-label">{{$sub_menu->display_name}}</span> <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    @foreach($sub_menu->sub_sub_menu as $sub_sub_menu)
                                        <li class="{{ (Request::segment(4) == $sub_sub_menu->name && Request::segment(3) == $sub_menu->name) ? 'active' : '' }}">
                                            <a href="{{url('backoffice/'.$menu->name.'/'.$sub_menu->name.'/'.$sub_sub_menu->name)}}"><i class="{{$sub_sub_menu->icon}}"></i> {{$sub_sub_menu->display_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class ="{{ (Request::segment(3) == $sub_menu->name && Request::segment(2) == $menu->name) ? 'active' : '' }}">
                                <a href="{{url('backoffice/'.$menu->name.'/'.$sub_menu->name)}}"><i class="{{$sub_menu->icon}}"></i> <span class="nav-label">{{$sub_menu->display_name}}</span></a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @else
            <li class ="{{ (Request::segment(2) == $menu->name) ? 'active' : '' }}">
                <a href="{{url('backoffice/'.$menu->name)}}"><i class="{{$menu->icon}}"></i> <span class="nav-label">{{$menu->display_name}}</span></a>
            </li>
        @endif
    @endforeach
@endforeach