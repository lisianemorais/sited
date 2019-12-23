<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sited</title>
    <link rel="icon" type="imagem/png" href="{{ url(asset('app/img/favicon.png')) }}" />
    <!-- Bootstrap início -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"> </script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- Bootstrap fim -->

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/f5da9efb5c.js" crossorigin="anonymous"></script>
    
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    
    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="{{ url(mix('app/css/style.css')) }}">

    <script src="{{  url(mix('app/js/app.js')) }}"></script>
</head>
<body>
<header>
<nav class="navbar navbar-expand-sm navbar-light nav-bar-custom">
    <div class="container">
        <a href="{{route('index')}}" class="navbar-brand">
            <img src="{{ url(asset('app/img/logo3.png')) }}" width="142">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{route('index')}}" class="nav-link">Agendamentos</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('create')}}" class="nav-link">Nova TED</a>
                </li>
                <li class="nav-item">
                    <a href="" class="btn btn-outline-light ml-4">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>

<div class="container">
    @yield('content')
</div>
    @yield('page-script')
</body>
</html>