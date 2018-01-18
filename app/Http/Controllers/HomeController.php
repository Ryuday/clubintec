<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $title = 'Listado de usuarios';

        return view('home', compact('title', 'users'));

    }

    public function show(User $user)
    {
      $title = 'Detalles del usuario';

      return view('users.show', compact('title', 'user'));
    }
}
