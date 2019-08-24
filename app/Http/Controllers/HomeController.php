<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\view_aluno;
use PDF;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function escola()
    {        
        $aluno = view_aluno::all();
        return view('home_escola', compact('aluno'));
    }

    public function too()
    {        
        $aluno = view_aluno::all();
        return view('home_too', compact('aluno'));
    }

    public function pdf($id)
    {
        $aluno = view_aluno::find($id);
        return view('aluno_pdf', \compact('aluno'));
        	/* // pass view file
            $pdf = PDF::loadView('aluno_pdf', compact('aluno'))->setPaper('a4');
            // download pdf
            return $pdf->download('alunoRA'.$aluno->RA.'.pdf'); */
        
    }
}
