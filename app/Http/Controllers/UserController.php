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
      public $roles = [
                1 => "Administrador",
                2 => "Docente",
                3 => "Secretaria",
                4 => "Estudiante"
              ];

      public function create()
      {
        $roles = $this->roles;
        return view('users.create', compact('roles'));
      }

      public function store()
      {
        $data = request()->validate([
          'name' => 'required|min:3|max:50|alpha',
          'username' => 'required|unique:users,username',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:6',
          'role_id' => 'required|numeric|in:1,2,3,4',
        ]);

        User::create([
          'name' => $data['name'],
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'role_id' => $data['role_id']
        ]);

        $user = DB::table('users')->where('email', $data['email'])->first();

        return redirect()->route('users.show', ['id' => $user->id]);
      }

      public function show(User $user)
      {
        return view('users.show', compact('user'));
      }

      public function edit(User $user)
      {
        $roles = $this->roles;
        return view('users.edit', compact('title', 'user', 'roles'));
      }

      public function update(User $user)
      {
        $data = request()->validate([
          'name' => 'required|min:3|max:50|alpha',
          'username' => 'required|unique:users,username,'.$user->id,
          'email' => 'required|email|unique:users,email,'.$user->id,
          'password' => '',
          'password_confirmation' => 'same:password',
          'role_id'  => 'required|numeric|in:1,2,3,4',
        ]);
        if($data['password'] != null){
          $data['password'] = bcrypt($data['password']);
        }else {
          unset($data['password']);
          unset($data['password_confirmation']);
        }

        $user->update($data);

        flash('Datos actualizados correctamente')->success();

        return redirect()->route('users.show', ['user' => $user]);
      }
}
