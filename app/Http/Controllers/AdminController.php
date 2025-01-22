<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $petugass = Petugas::all();
        return view('admin.profile.petugas',compact('petugass'));
    }
}
