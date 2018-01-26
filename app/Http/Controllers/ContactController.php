<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Session;
class ContactController extends Controller
{
    public function index()
    {

      return view('emails.contact');

    }

    public function store(Request $request)
    {

      $user = User::where('email', $request->email)->get()->first();

      if (Auth::check()) {
        $request['name'] = Auth::user()->name;
        $request['email'] = Auth::user()->email;
        $request['title'] = "Registrados - ".$request['title'];
      }elseif ($user['id'] != null) {
        $request['title'] = "Registrados - ".$request['title'];
      }else {
        $request['title'] = "No Registrados - ".$request['title'];
      }
      $request['view'] = 'emails.question';
      Mail::to('clubintec@gmail.com', 'Contacto')
        ->send(new \App\Mail\EmailUser($request));

      flash('Mensaje enviado correctamente')->success();

      return view('emails.contact');

    }
}
