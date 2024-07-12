<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Reset Password</title>
</head>

<body class="bg-primary">
    <div class="container my-5">
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg rounded p-3 text-dark bg-opacity-10">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                            </div>
                        @endif
                        @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        <main class="form-signin p-3">
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <h1 class="mb-4 text-center">Reset Password</h1>
                                <p class="mb-3">Silahkan Reset Password.</p>
                                <input name="token" type="hidden" value="{{ request('token') }}">
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                        placeholder="Email address" value="{{ old('email', request('email')) }}" readonly>
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                        placeholder="Password">
                                    <label for="password">New Password</label>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                                        name="password_confirmation" placeholder="Confirm Password" required>
                                    <label for="password_confirmation">Confirm Password</label>
                                    @error('password_confirmation')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
