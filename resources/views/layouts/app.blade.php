<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- CUSTOM STYLES --}}
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('discussions.index') }}" class="nav-link">
                                See Discussions
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @auth
                        <notification :userid="{{ auth()->user()->id }}" :unreads="{{ auth()->user()->unreadNotifications }}"></notification>
                        @endauth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->name) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(!in_array(request()->path(), ['admin/login', 'admin/register', 'admin/password/email', 'admin/password/reset']))
            <main class="container py-4">

                <div class="row">
                    <div class="col-md-4">
                        @auth
                            <a href="{{ route('discussions.create') }}" class="btn btn-primary btn-sm mb-2" style="width: 100%;">Add Discussion</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm mb-2" style="width: 100%;">Sign in to add discussion</a>
                        @endauth
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Channels
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @if ($channels->count() > 0)
                                        @foreach ($channels as $channel)
                                            <li class="list-group-item">
                                                <a href="{{ route('discussions.index') }}?channel={{ $channel->slug }}">{{ $channel->name }}</a> <span class="badge badge-info float-right">{{ $channel->discussions->count() }}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        @include('admin.partials.alerts')

                        @yield('content')
                    </div>
                </div>
            </main>
        @else
            <main class="py-4">
                @yield('content')
            </main>
        @endif
    </div>
</body>

<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- CUSTOM JS --}}
<script>
    $(document).ready(function () {
        setTimeout(function(){
            $('.alert-danger').hide(1000);
            $('.alert-success').hide(1000);
            $('.alert-warning').hide(1000);
        }, 3000);
    });
</script>
@yield('js')

</html>
