<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('series.index') }}">Home</a>
            @auth
                <a href="{{ route('login.logout') }}" class="btn btn-primary">Sair</a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-primary">Entrar</a>
            @endguest
        </div>
    </nav>

    <div class="container">
        <h1>{{ $title }}</h1>

        @isset($mensagemSucesso)
            <div class="alert alert-info" role="alert">
                {{ $mensagemSucesso }}
            </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>
</body>

</html>