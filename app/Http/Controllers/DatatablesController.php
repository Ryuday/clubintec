<?php

namespace App\Http\Controllers;

use App\User;
use App\Pensum;
use Illuminate\Http\Request;
// Tabla de Datos
use DataTables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\CollectionDataTable;

class DatatablesController extends Controller
{
  /**
   * Process datatables ajax request.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function anyUsersData()
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
  /**
   * Process datatables ajax request.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function anyPensumData()
  {
      $model = Pensum::query()
                ->get();
      return DataTables::collection($model)
              ->addColumn('action', function ($user) {
                return '<a href="" class="btn btn-xs btn-success">Ver</a> <a href="" class="btn btn-xs btn-primary">Editar</a>';
              })
              ->toJson();
  }
}
