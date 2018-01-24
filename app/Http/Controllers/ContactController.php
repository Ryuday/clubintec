<?php

namespace App\Http\Controllers;

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

      #return new \App\Mail\EmailUser($request);

      Mail::to('clubintec@gmail.com', 'Contacto')
        ->send(new \App\Mail\EmailUser($request));
      #Session::flash('message', 'Mensaje enviado correctamente');
      return view('emails.contact');

    }
}
