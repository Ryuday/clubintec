<?php

namespace App\Http\Controllers;

use App\Pensum;
use Illuminate\Http\Request;

class PensumController extends Controller
{
    public function index()
    {
        return view('pensums.index');
    }

    public function create()
    {
      return view('pensums.create');
    }
}
