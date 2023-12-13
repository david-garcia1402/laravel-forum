<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum de dúvidas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    <style>
        body {
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: 50px;
            width: 80%;
        }

        .container-fluid a {
            color: white;
        }

    </style>
    @include('include.navbar')
    <div class="container">
        @if(Session::has('semMaterias'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{Session::get('semMaterias')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(Session::has('atualizado'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Dúvida atualizado com sucesso
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @include('include.table-forum')
            @elseif(Session::has('semDuvidas'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Não há dúvidas no fórum atualmente. Volte mais tarde!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                @include('include.table-forum')
        @endif
    </div>
</body>
</html>