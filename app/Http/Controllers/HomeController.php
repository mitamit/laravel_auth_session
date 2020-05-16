<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        #pruebas con sesión - lo correcto es instanciar un objeto de la clase user y pasar los parametros a la sesión

        //consigue los valores de sesión por request
        /* $request->session()->put(['Juanma'=>'Administrador']);

        consigue los valores de sesión por super variable session
        session(['María' => 'Estudiante']);*/


        //flash conserva la info de la sesión
        //$request->session()->flash('entrada1', 'Éxito 1');
        //mantiene un valor en el flash para siempre
        //$request->session()->keep('clavePermanente', 'valorPermanenete');

        //evita los ataques session fixation
        $request->session()->regenerate();

        $session = $request->session()->all();

        $user = Auth::user();

        return view('home', compact('user', 'session'));
    }
}
