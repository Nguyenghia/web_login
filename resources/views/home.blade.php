<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the Home Page!</h1>
        <p>This is the home page of your Laravel application.</p>

        <!-- Hiển thị tên người dùng nếu đã đăng nhập -->
        @auth
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 text-center">
                    <h3>Welcome, {{ Auth::user()->name }}!</h3>
                    <!-- Form đăng xuất -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Logout</button>
                    </form>
                </div>
            </div>
        @endauth

        <!-- Hiển thị nút Login nếu chưa đăng nhập -->
        @guest
            <div class="row justify-content-center">
                <div class="col-12 col-md-4 text-center">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-block">Login</a>
                </div>
            </div>
        @endguest
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
