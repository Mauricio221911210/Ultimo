<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Mail\ContactanosMailable;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    public function index(){

        //return view('contactanos.index');
        return view('want');

    }

    public function store(Request $request){
        
        $request->validate([
            'name' => 'required',
            'correo' => 'required|email',
            'mensaje' => 'required',

        ]);

        $correo = new ContactanosMailable($request->all());
       Mail::to('al221911210@gmail.com')->send($correo);

    return redirect()->route('contactanos.index')->with('info','Mensaje enviado');
    //return redirect()->route('want')->with('info','Mensaje enviado');
    }
}
