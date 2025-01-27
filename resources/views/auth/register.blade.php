
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

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

    <div class="row __principal" style="margin-top: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6 __login_form shadow">
        <h1>Inscription</h1>


            <form action="{{route("auth.traitementRegister")}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Username:</label>
                    <input type="text" class="form-control" name="username" >
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <button type="submit" class="btn btn-primary m-2">Register</button>

              <div class="row">
                <p>
                    Vous avez déjà un compte?
                    <a href="{{ url('/') }}" class="link">login</a>.
                </p>
            </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>



