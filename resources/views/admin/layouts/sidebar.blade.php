<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">{{config('app.name')}}</a>
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
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-comments"></i>Comments</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-users"></i>Users</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-envelope"></i>Mails</a>
                    
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-lock"></i>Admins</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><a href="forms-basic.html">All Admins</a></li>
                            <li><a href="forms-advanced.html">Add Admin</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
