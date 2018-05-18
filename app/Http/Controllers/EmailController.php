<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
    public function send(Request $request, $titulo, $email_destinatario) {
    	
    	$this->email_destinatario = $email_destinatario;

    	$data = array(
    		'titulo' => $titulo,
    		'nombre_remitente' => $request->input('nombre_remitente'),
    		'mensaje_remitente' => $request->input('mensaje_remitente'),
    		'numero_remitente' => $request->input('numero_remitente')
    	);

    	Mail::send('mails/contacto', $data, function ($message) {
    		$message->subject('¡Tienes un nuevo interesado!');
    		$message->to($this->email_destinatario);
    	});

    	return redirect()->back()->with('alert', 'Has enviado un mensaje al vendedor. ¡Pronto se pondrá en contacto contigo!');
    }
}
