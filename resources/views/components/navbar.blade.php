<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route("home") }}">Kees de expert boeken</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route("home") }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("auth.login")}}">inloggen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("auth.register") }}">registeren</a>
            </li>
            @endguest
            @auth
                @role("admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin") }}">Admin dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("admin.appointments") }}">Afspraken</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("appointment.book") }}">Afspraak maken</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("user.appointments") }}" class="nav-link">Mijn afspraken</a>
                    </li>
                @endrole
                <li class="nav-item">
                    <form action="{{ route("auth.logout") }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">uitloggen</button>
                    </form>
                </li>
            @endauth
        </ul>
      </div>
    </div>
</nav>