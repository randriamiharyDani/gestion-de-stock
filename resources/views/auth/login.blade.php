

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de stock</title>
    <link rel="stylesheet" href={{asset('assets/css/style.css')}}>
    <link rel="stylesheet" href={{asset('assets/css/auth.css')}}>
    <link rel="stylesheet" href={{asset('assets/bootstrap/css/bootstrap.min.css')}}>

</head>
<body>
    <div class="container">
    <div class="row __principal" style="margin-top: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6 __login_form shadow">
                @if(session('error'))
                    <div class="alert alert-danger texte-center">
                        {{ session('error') }}
                    </div>
                @endif

            <h1>login</h1>

            <form action="{{route("auth.authLogin")}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Email:</label>
                    <input type="text" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="email">Password:</label>
                    <input type="password" class="form-control"  name="password">
                </div>

                <button type="submit" class="btn btn-primary m-2">Se connecter</button>
                <div class="row">
                <p>
                    Veuillez vous inscrire en cliquant sur
                    <a href="{{ url('auth/register') }}" class="link">s'inscrire</a>.
                </p>
                <span><a href="{{ url('auth/forgot-password') }}" class="link">Mot de passe oublié?</a></span>
            </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

