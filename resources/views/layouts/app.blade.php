<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background : #d9d9d9;">
    <nav class="navbar navbar-expand-lg bg-light d-flex justify-content-center">
        <h3>Laravel 11</h3>
    </nav>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded text-dark bg-opacity-10">
                    <div class="card-body text-center">
                        <h1>CRUD Penjualan Mobil</h1>
                        <p>Selamat Datang di CRUD Penjualan Mobil</p>
                    </div>
                    <hr>
                    <div class="mx-3">
                        <a class="btn btn-primary" href="{{ url('/authors') }}">Data Penjual</a>
                        <a class="btn btn-primary" href="{{ url('/mobils') }}">Data Mobil</a>
                    </div>
                    <div class="card-body mt-1">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    

    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
</body>
</html>