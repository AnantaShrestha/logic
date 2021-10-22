  <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('admin.index')}}">Home</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Settings</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Admin Global</span></a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Admin Menu</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('menu.index')}}">List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">User Management</span></a>
                        <ul aria-expanded="false">
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Roles</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('role.create')}}">Create</a></li>
                                    <li><a href="{{route('role.index')}}">List</a></li>
                                </ul>
                            </li>
                             <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Permission</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('permission.create')}}">Create</a></li>
                                    <li><a href="{{route('permission.index')}}">List</a></li>
                                </ul>
                            </li>
                             <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">User</a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('user.create')}}">Create</a></li>
                                    <li><a href="{{route('user.index')}}">List</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>