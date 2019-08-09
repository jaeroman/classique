<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="/images/dashboard/logo-icon.png" />
    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="/css/dashboard/bulma.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard/style.min.css">
    @yield('style')

</head>

<body class="has-navbar-fixed-top">
    <nav class="navbar is-fixed-top box-shadow-y">
        <div class="navbar-brand">
            <a role="button" class="navbar-burger toggler" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            <a href="#" class="navbar-item has-text-weight-bold has-text-black">
                CLASSIQUE HERBS
            </a>
            <a role="button" class="navbar-burger nav-toggler" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div class="navbar-end">

            <div class="navbar-item has-dropdown is-hoverable">
                <a href="#" class="navbar-link">
                    {{ auth()->user()->name }}
                </a>
                <div class="navbar-dropdown is-right">
                    {{--     
              <a href="#" class="navbar-item">ACCOUNT</a>
              <hr class="navbar-divider" /> --}}
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        LOG OUT
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        </div>
    </nav>

    @yield('content')


    @yield('footer')

    @include('sweetalert::alert')
</body>

</html>
