<?php

namespace App\Http\Controllers;

use App\Pensum;
use Illuminate\Http\Request;
// Tabla de Datos
use DataTables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\CollectionDataTable;

class PensumController extends Controller
{
    public function index()
    {
      return view('pensum.index');
    }
    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
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
