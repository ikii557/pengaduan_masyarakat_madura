class="{{ auth()->user()->role == 'admin' ? 'd-none' : '' }}
dd($request->all());


<img src="{{ asset('storage/' . $user->foto) }}" class="rounded-circle"
 style="width: 150px; height: 150px; object-fit: cover;" alt="Foto Profil">


 php artisan storage:link


 <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
    <label for="foto" class="form-label">Foto Profil</label>
    <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class  AuthController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $path = null;

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('uploads/foto_users', 'public');
    }

    User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'foto' => $path,
    ]);

    return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
}
}
