<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <span class="navbar-brand">校园·出行</span>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
                <li><a href="{{url('/')}}">首页</a></li>
                <li><a href="{{url('/history')}}">我的行程</a></li>
                <li><a href="{{url('/ranking')}}">排行榜</a></li>
                <li><a href="{{url('/me')}}">个人中心</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <!-- Authentication Links -->
            <pickup-user-info></pickup-user-info>
        </div>
    </div>
</nav>