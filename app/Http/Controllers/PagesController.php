<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	} 
	
    public function inicio() {
    	return view('inicio');
    }

    public function tablon() {
    	return view('tablon'); // TODO
    }

    public function perfil() {
    	return view('perfil'); // TODO
    }
}
