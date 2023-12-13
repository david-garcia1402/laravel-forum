<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Nova matéria</title>
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

        .form-card {
            margin: 0 auto;
            background-color: #222;
            color: white;
            padding: 20px;
            border: 1px blue solid;
            max-width: 600px;
            border-radius: 20px
        }

        .container-fluid a{
            color: white !important;
        }
    </style>
    @include('include.navbar')
    <div class="container">
        @if (Session::has('hasSubject'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('hasSubject') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(Session::has('registeredSubject'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('registeredSubject') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="form-card">
            <form action="{{ route('forum.store-subject') }}" method="POST">
                @csrf
                <legend>Nova matéria</legend>
                <div class="mb-3">
                    <label for="subjects" class="form-label">Matérias disponíveis</label>
                    <select class="form-select" name="subjects" id='subjects'>
                        <option value='Artes'>Artes</option>
                        <option value='Biografia'>Biografia</option>
                        <option value='Biologia'>Biologia</option>
                        <option value='Espanhol'>Espanhol</option>
                        <option value='Física'>Física</option>
                        <option value='Geografia'>Geografia</option>
                        <option value='Gramática'>Gramática</option>
                        <option value='História'>História</option>
                        <option value='História do Brasil'>História do Brasil</option>
                        <option value='História Geral'>História Geral</option>
                        <option value='Inglês'>Inglês</option>
                        <option value='Literatura'>Literatura</option>
                        <option value='Matemática'>Matemática</option>
                        <option value='Português'>Português</option>
                        <option value='Química'>Química</option>
                        <option value='Redação'>Redação</option>
                        <option value='Guerras Mundiais'>Guerras Mundiais</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Suas matérias</label>
                    <br>
                @if($userSubject)
                    <div class="descricao ">
                        <textarea class='form-control' style="max-height:550px; min-height:300px;" disabled id='subjects'>
                            @foreach ($userSubject as $subject)
                                {{ $subject->subject }}
                            @endforeach
                        </textarea> 
                    </div>
                </div>
                @endif
                <button type="submit" class="btn btn-light">Enviar</button>
            </form>
        </div>  
    </div>    
</body>
</html>