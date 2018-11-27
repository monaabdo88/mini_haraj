<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="../">{{get_settings()->site_name}}</a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('/admin/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="">
                        <a href="{{url('/admin/settings')}}"><i class="menu-icon fa fa-cogs"></i>Settings</a>
                    </li>
                    <li class="">
                        <a href="{{url('/admin/categories')}}"><i class="menu-icon fa fa-table"></i>Categories</a>
                    </li>
                    <li class="">
                        <a href="{{url('/admin/posts')}}"> <i class="menu-icon fa fa-th"></i>Posts</a>
                    </li>
                    <li class="">
                        <a href="{{url('/admin/tags')}}"> <i class="menu-icon fa fa-hashtag"></i>Tags</a>
                    </li>
                    <li>
                        <a href="{{url('/admin/users')}}"> <i class="menu-icon fa fa-users"></i>Users</a>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
