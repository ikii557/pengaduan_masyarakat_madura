<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ke dalam pengaduan masyarakat</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset('assets/img/kaiadmin/cilacaplogo.png')}}"
      type="image/x-icon"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('your-background-image.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }
        .auth-form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h4 {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-form border">
            <!-- Title -->
            <h4 class="text-center mb-4">
                <img src="{{asset('assets/img/kaiadmin/cilacaplogo.png')}}" height="50px" alt="">
                <a href="/register" class="text-dark" style="text-decoration: none;">Log In</a> Untuk Masuk
                <hr>
            </h4>

            <!-- Login Form -->
            <form action="/store/login" method="post" class="mt-4">
                @csrf
                <!-- Username Input -->
                <div class="form-group mb-3">
                    <label for="username"><strong>Username</strong></label>
                    <input
                        name="username"
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        placeholder="Masukkan Username Anda"
                        value="{{ old('username') }}"
                    >
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group mb-3">
                    <label for="password"><strong>Password</strong></label>
                    <input
                        name="password"
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        placeholder="Masukkan Password Anda"
                    >
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block mt-2">LOGIN</button>
                </div>
            </form>

            <!-- Footer Message -->
            <div class="new-account mt-3 text-center">
                <p>Silahkan masuk karena Anda sudah didaftarkan oleh SuperAdmin. Terima Kasih!</p>
            </div>
        </div>
    </div>
</body>
</html>
