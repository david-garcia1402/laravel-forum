<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Estatísticas</title>
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
        <div class="form-card">
            <legend>Verifique suas estatísticas #####</legend>
            <div class="mb-3">
                <label for="form-select" class="form-label">Entrou em:</label>
                <input class="form-control" type="text" name="dateRegister" id="dateRegister">
            </div>
            <div class="mb-3">
                <label class="form-label">Dúvidas postadas:</label>
                <input class="form-control" type="text" id="qtdSupports" name="qtdSupports">
            </div>
            <div class="mb-3">
                <label class="form-label">Dúvidas respondidas:</label>
                <input class="form-control" type="text" id="qtdAnswers" name="qtdAnswers">
            </div>
            <div class="mb-3">
                <label class="form-label">Suas respostas:</label>
                <input class="form-control" type="text" id="myAnswers" name="myAnswers">
            </div>
            <button type="submit" class="btn btn-light">Enviar</button>
        </div>  
    </div>    
</body>
</html>