<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Resposta</title>
</head>
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

    #scrollable-div {
        max-height: 300px; /* Ajuste este valor conforme necessário */
        overflow-y: auto; /* Adiciona uma barra de rolagem vertical quando necessário */
        border: 1px solid #ccc; /* Apenas para visualização, pode ser removido */
        padding: 10px; /* Adicione algum preenchimento conforme necessário */
        border: none;
        scr
    }

    #scrollable-div::-webkit-scrollbar {
            width: 10px;
        }

    #scrollable-div::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 5px;
    }

    #scrollable-div::-webkit-scrollbar-track {
        background-color: #eee;
        border-radius: 5px;
    }

</style>
<body>
@include('include.navbar')
<div class="container">
    <div class="form-card">
        <form action="{{ route('answer.store') }}" method="post">
            @csrf
            <legend id='user' name='user'>Respondendo {{ $user }}</legend>
            <div class="mb-3">
                <label id='subject' name='subject' for="form-select" class="form-label">Matéria</label>
                <input type="text" class="form-control" value="{{ $subject }}" id="subject" name="subject" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Dúvida</label>
                <textarea class="form-control" id="description" name="description" type="textarea" disabled>{{ $description }}
                </textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Sua resposta</label>
                <textarea class="form-control" style="max-height: 300px; min-height:100px; resize:vertical" id="answer" name="answer" type="textarea">
                </textarea>
                <input type="hidden" name="idsupport" id="idsupport" value="{{ $id }}">
                <br>
            <button type="submit" class="btn btn-light mb-3">Enviar</button>
        </form>
    </div>  
    @if ($myanswers)
        <div class="mb-3" id="scrollable-div">
            <legend style="text-align: center" id="answers" name='answers'>
                <p class="align-items-center">Respostas</p>
            </legend>
                @foreach ($myanswers as $answer)
                    <p>{{ $answer->name }} <textarea style="max-height: 300px; min-height:80px; resize:vertical" class="form-control mt-2" id="answer" name="answer" disabled> {{$answer->answer}} </textarea></p>
                @endforeach
        </div>
    @endif
</div> 
</body>
</html>