<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{asset('assets/img/kaiadmin/cilacaplogo.png')}}"
      type="image/x-icon"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
    <div class="auth-form">
        <h4 class="text-center mb-4">Register Akun Baru</h4>
        <form action="/store/register" method="post">
            @csrf

            <div class="form-group">
                <label><strong>NIK</strong></label>
                <input name="nik" type="text" class="form-control">
                @error('nik')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Nama Lengkap</strong></label>
                <input name="nama_lengkap" type="text" class="form-control" >
                @error('nama_lengkap')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Jenis Kelamin</strong></label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Username</strong></label>
                <input name="username" type="text" class="form-control" >
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Password</strong></label>
                <input name="password" type="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>No Telepon</strong></label>
                <input name="no_telepon" type="text" class="form-control" >
                @error('no_telepon')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Alamat</strong></label>
                <textarea name="alamat" class="form-control"></textarea>
                @error('alamat')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <label><strong>Role</strong></label>
                <select name="role" class="form-control">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="masyarakat" {{ old('role') == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                </select>
                @error('role')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block mt-2">REGISTER</button>
            </div>
        </form>
        <div class="new-account mt-3">
            <p>Sudah punya akun? <a class="text-primary" href="/login">Login</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
