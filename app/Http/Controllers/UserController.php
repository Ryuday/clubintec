<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\CollectionDataTable;

class UserController extends Controller
{

      public function show(User $user)
      {

        return view('users.show', compact('user'));
      }

      public function edit(User $user)
      {
        $title = 'Actualizar usuario';
        $roles = [
          1 => "Administrador",
          2 => "Docente",
          3 => "Secretaria",
          4 => "Estudiante"
        ];

        return view('users.edit', compact('title', 'user', 'roles'));
      }

      public function update(User $user)
      {
        $data = request()->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users,email,'.$user->id,
          'password' => '',
          'password_confirmation' => 'same:password',
        ]);

        if($data['password'] != null){
          $data['password'] = bcrypt($data['password']);
        }else {
          unset($data['password']);
          unset($data['password_confirmation']);
        }

        $user->update($data);

        return redirect()->route('users.show', ['user' => $user]);
      }
}
