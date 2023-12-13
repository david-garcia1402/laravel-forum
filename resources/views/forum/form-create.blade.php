<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>Nova dúvida</title>
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
            <form action="{{ route('forum.store') }}" method="post">
                @csrf
                <legend>Dúvida</legend>
                <div class="mb-3">
                    <label for="form-select" class="form-label">Matéria</label>
                    <select class="form-select" name="subjects" id="subjects">
                    @foreach ($userSubjects as $subject)
                        <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" id="description" name="description" type="textarea" required></textarea>
                </div>
                <button type="submit" class="btn btn-light">Enviar</button>
            </form>
        </div>  
    </div>    
</body>
</html>