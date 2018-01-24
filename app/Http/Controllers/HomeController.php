<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\CollectionDataTable;

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

        return view('home', compact('users'));

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $model = User::query();
        return DataTables::eloquent($model)
                ->addColumn('action', function ($user) {
                  return '<a href="'.route("users.show", ["id" => $user->id]).'" class="btn btn-xs btn-success">Ver</a> <a href="'.route("users.edit", ["id" => $user->id]).'" class="btn btn-xs btn-primary">Editar</a>';
                })
                ->toJson();
    }

    public function show(User $user)
    {

      return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
      $title = 'Actualizar usuario';

      return view('users.edit', compact('title', 'user'));
    }

}
