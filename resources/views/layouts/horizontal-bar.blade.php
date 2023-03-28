<div class="horizontal-bar-wrap">
    <div class="header-topnav">
        <div class="container-fluid">
            <div class=" topnav rtl-ps-none" id="" data-perfect-scrollbar data-suppress-scroll-x="true">
                <ul class="menu float-left">
                    <li class="{{ request()->is('dashboard/*') ? 'active' : '' }}">

                        <div>


                            <div>
                                <label class="toggle" for="drop-2">

                                    Dashboard
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Bar-Chart"></i>
                                    Dashboard
                                </a>

                                <input type="checkbox" id="drop-2">
                                <ul>

                                    <li class="nav-item ">
                                        <a class="{{ Route::currentRouteName()=='dashboard' ? 'open' : '' }}" href="{{route('dashboard')}}">
                                            <i class="nav-icon mr-2 i-Clock-3"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <li class="{{ request()->is('apps/*') ? 'active' : '' }}">

                        <div>


                            <div>
                                <label class="toggle" for="drop-2">

                                    Apps
                                </label>
                                <a href="#">
                                    <i class="nav-icon mr-2 i-Computer-Secure"></i> Apps
                                </a><input type="checkbox" id="drop-2">
                                <ul>

                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='invoice' ? 'open' : '' }}" href="{{route('invoice')}}">
                                            <i class="nav-icon mr-2 i-Add-File"></i>
                                            <span class="item-name">Invoice</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='inbox' ? 'open' : '' }}" href="{{route('inbox')}}">
                                            <i class="nav-icon mr-2 i-Email"></i>
                                            <span class="item-name">Inbox</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='chat' ? 'open' : '' }}" href="{{route('chat')}}">
                                            <i class="nav-icon mr-2 i-Speach-Bubble-3"></i>
                                            <span class="item-name">Chat</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='calendar' ? 'open' : '' }}" href="{{route('calendar')}}">
                                            <i class="nav-icon mr-2 i-Calendar-4"></i>
                                            <span class="item-name">Calendar</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='task-manager' ? 'open' : '' }}" href="{{route('task-manager')}}">
                                            <i class="nav-icon mr-2 i-Receipt"></i>
                                            <span class="item-name">Task manager</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='task-manager-list' ? 'open' : '' }}" href="{{route('task-manager-list')}}">
                                            <i class="nav-icon mr-2 i-Receipt-4"></i>
                                            <span class="item-name">Task list</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ Route::currentRouteName()=='toDo' ? 'open' : '' }}" href="{{route('toDo')}}">
                                            <i class="nav-icon mr-2 i-Receipt-4"></i>
                                            <span class="item-name">Minimal ToDo</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- end apps -->

                </ul>


            </div>
        </div>
    </div>

</div>
<!--=============== Horizontal bar End ================-->
