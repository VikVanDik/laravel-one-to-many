<header class="bg-dark">
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}" target="_blank">Vai al sito</a>
            <form class="d-flex" role="search" action="{{route('logout')}}" method="POST">
            @csrf
                <button class="btn btn-light" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </nav>
</header>
