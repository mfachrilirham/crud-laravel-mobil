<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-primary">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg rounded text-dark bg-opacity-10">
                    <div class="card-header">
                        <h3 class="card-title text-center">Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <h5>Welcome, {{ Auth::user()->name }}</h5>
                        <form onsubmit="return confirm('Anda yakin ingin logout?')" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
