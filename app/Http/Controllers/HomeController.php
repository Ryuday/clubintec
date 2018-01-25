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

        return view('home', compact('users'));

    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $model = User::query()
                  ->select('users.id','name','email', 'title')
                  ->leftJoin('roles', 'users.role_id', '=', 'roles.id')
                  ->get();

        return DataTables::collection($model)
                ->addColumn('action', function ($user) {
                  return '<a href="'.route("users.show", ["id" => $user->id]).'" class="btn btn-xs btn-success">Ver</a> <a href="'.route("users.edit", ["id" => $user->id]).'" class="btn btn-xs btn-primary">Editar</a>';
                })
                ->toJson();
    }

}
