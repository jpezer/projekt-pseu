
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>es-DDZ</title>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <!-- Brand -->
    <a class="navbar-brand" href="{{route('stranice.okvir')}}">es-DDZ</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('stranice.okvir')}}"style="font-color:blue;">Početna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('stranice.informacije')}}">Informacije</a>
        </li>
        
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Akcije
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('login')}}">Prijavi se</a>
                <a class="dropdown-item" href="{{route('register')}}">Registriraj se</a>
            </div>
        </li>

    </ul>
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
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>

<div class="container" style="margin-top: 80px;">

    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('stranice.okvir')}}">Početna</a></li>
                <li class="list-group-item"><a href="#">O nama</a></li>
                <li class="list-group-item"><a href="{{route('stranice.informacije')}}">Informacije</a></li>
                <li class="list-group-item"><a href="{{route('stranice.dodaj_zadacu')}}">Dodaj zadacu</a></li>
                <li class="list-group-item"><a href="{{route('stranice.moje_zadace')}}">Moje zadace</a></li>
                @if(Auth::user()->type=='admin')
                    <li class="list-group-item"><a href="{{route('stranice.pregled_studija')}}">Studiji</a></li>
                    <li class="list-group-item"><a href="{{route('stranice.pregled_predmeta')}}">Predmeti</a></li>
                    <li class="list-group-item"><a href="{{route('stranice.pregled_zadaca')}}">Popis zadaca</a></li>
                @endif
            </ul>
        </div>

        <div class="col-sm-9">

            @yield('sadrzaj')

        </div>
    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>
