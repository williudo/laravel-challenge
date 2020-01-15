<body>
    <header>
        <div class="row">
        <div class="col-md-4">
            <h2 class="app-name">{{env('APP_NAME')}}</h2>
        </div>
        <div class="col-md-2 offset-md-6 login-widget">
            <a class=""  href="{{route('login')}}">Login</a>
            /
            <a class="" href="{{route('register')}}">Register</a>
        </div>
        </div>
        <h1>{{$title}}</h1>
        <nav>
            <a href="{{route('home')}}">Home</a>
            <a href="{{route('dashboard')}}">Panel</a>
        </nav>
        @yield('header')
    </header>