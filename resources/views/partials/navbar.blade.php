<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @class([
                        'nav-link',
                        'active' => request()->route()->getName() === 'blog.index',
                    ]) href="{{ route('blog.index') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Administration
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('blog.create') }}">Création d'article</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <p class="nav-link">Bonjour {{ Auth::user()->name }}</p>
                    </li>

                    <form class="nav-item"action="{{ route('auth.logout') }}" method="post">@csrf<button class="nav-link"
                            type="submit">Se deconnecter</button></form>

                @endauth
                @guest
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => request()->route()->getName() === 'auth.login',
                        ]) href="/login">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a @class([
                            'nav-link',
                            'active' => request()->route()->getName() === 'auth.register',
                        ]) href="/register">Créer un compte</a>
                    </li>
                @endguest
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
