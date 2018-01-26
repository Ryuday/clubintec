<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;
class VerifyEmailController extends Controller
{
  public function verify($code)
  {
    $user = User::where('confirmation_code',$code)->first();

    if(!$user){
      return redirect()->route('home');
    }

    $user->confirmed = true;
    $user->confirmation_code = null;
    $user->save();

    flash('¡Has confirmado correctamente tu correo!')->success();

    return redirect()->route('home');
  }

}
