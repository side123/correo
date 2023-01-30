<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function private(){
        //Llamada gate admin-only concede permisos de administrador
        // AuthServiceProvider
        // allows permite acceso y denies niega acceso
        if(Gate::allows('admin-only', auth()->user())){
        return view('private');
        }
        else{
            abort(403);
        }
    }
}
