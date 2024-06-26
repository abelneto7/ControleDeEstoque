<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Obtém o usuário logado
        $user = Auth::user();

        return view('app.home', ['user' => $user]);
    }
}
