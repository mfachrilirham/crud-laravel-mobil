<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Register</title>
</head>

<body class="bg-primary">
    <div class="container my-5">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg rounded p-3 text-dark bg-opacity-10">
                    <div class="card-body">
                        <main class="form-signin p-3">
                            <form method="POST" action=" {{ route('register') }}">
                                @csrf
                                <h1 class="mb-4 text-center">Create Account!</h1>
                                <p>Silahkan Register</p>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name">
                                    <label for="name">Name</label>
                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password">
                                    <label for="password_confirmation">Confirm Password</label>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                                <p class="my-2 text-muted text-center">Sudah punya akun ? <a href=" {{ route('login') }}">Login</a></p>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
