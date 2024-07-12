<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Forgot Password</title>
</head>

<body class="bg-primary">
    <div class="container my-5">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg rounded p-3 text-dark bg-opacity-10">
                    <div class="card-body">
                        <main class="form-signin p-3">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('forgot-password') }}">
                                @csrf
                                <h1 class="mb-4 text-center">Forgot Password</h1>
                                <div class="form-floating">
                                    <input type="email" class="form-control mt-2 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email address" value="{{ old('email') }}">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-2">Send Email Link</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
