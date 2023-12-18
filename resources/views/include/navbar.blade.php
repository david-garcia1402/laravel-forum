<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('forum.index') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('forum.create') }}">Criar dúvida</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('forum.user') }}">Perfil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white px-2" href="{{ route('forum.create-subject') }}"><span>Inserir matéria</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white px-2" href="{{ route('forum.user-dashboard') }}"><span>Estatísticas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white px-2" href="{{ route('logout') }}"><span>Logout</span></a>
        </li>
        </ul>
    </div>
    </div>
</nav>