<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function create()
    {
        $iduser = auth()->user()->id; //id do usuário da sessão
        $materiasUsuario = array();
        $materiasCadastradas = Subject::where('user_id', $iduser)->count(); //query para verificar se o usuário já cadastrou alguma matéria
        
        if ($materiasCadastradas > 0) {
                $materiasUsuario = Subject::where('user_id', $iduser)->get(); //se sim, vai pegar essa(s) matéria(s) para fazer um select das matérias já cadastradas no blade
                return view('forum.form-subject-create', ['userSubject' => $materiasUsuario]);
        }

        return view('forum.form-subject-create', ['userSubject' => $materiasUsuario]);
    }

    public function store(Request $request)
    {
        $iduser = auth()->user()->id; //id do usuário da sessão
        $subject = $request->subjects; //matéria que veio do select

        $registro = Subject::where('subject', $subject)
                            ->where('user_id', $iduser)->count();
                            
        if ($registro > 0) {
            Session::flash('hasSubject', 'Você já cadastrou essa matéria.');
            return redirect()->route('forum.create-subject');
        } else {
            Subject::insert([
                'subject' => $subject,
                'user_id' => $iduser,
            ]);
            Session::flash('registeredSubject', 'Cadastro da matéria realizado com sucesso!');
            return redirect()->route('forum.create-subject');

        }
    }
}
