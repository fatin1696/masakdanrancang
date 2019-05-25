<?php

namespace App\Http\Controllers;
use App\user;
use Illuminate\Http\Request;

class penggunaController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('pengguna.index', compact('users'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
