<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class SupportController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $key = Str::random(32);
            Session::put('key', $key);
            $qntdRegistros = Support::count();
            if ($qntdRegistros > 0) {
                $forum = DB::table('supports')->select('name as user', 'supports.id as id', 'users.id as idUser', 'status', 'subject', 'description')
                    ->leftJoin('users', 'supports.user_id', '=', 'users.id')->get();
                return view('forum.index', ['supports' => $forum, 'contador' => 1]);
            } else {
                Session::flash('semDuvidas');
                $supports = array();
                return view('forum.index', ['supports' => $supports]);
            }
        }
    }

    public function userDetails()
    {
        if (auth()->check()) {
            $userData = auth()->user();
            $details = [
                'name'  => $userData->name,
                'email' => $userData->email,
                'id'    => $userData->id
            ];

            return view('forum.user-details', ['details' => $details]);
        }
    }

    public function create()
    {
        $iduser = auth()->user()->id; 
        $materiasCadastradas = DB::table('subjects')->where('user_id', '=', $iduser)->count(); //query para verificar se o usuário já cadastrou alguma matéria
        
        if ($materiasCadastradas > 0) {
            $materiasUsuario = DB::table('subjects')->where('user_id', '=', $iduser)->get();
            return view('forum.form-create', ['userSubjects' => $materiasUsuario]);
        } else {
            Session::forget('semDuvidas');
            Session::flash('semMaterias', 'Cadastre ao menos uma matéria em "Inserir matéria" para postar uma dúvida.');
            return redirect()->route('forum.index');
        }
    }

    public function destroy($id)
    {
        DB::table('supports')->where('id', '=', $id)->delete();
        return redirect()->route('forum.index');
    }

    public function edit($id)
    {
        $editId = DB::table('supports')->where('id', '=', $id)->get();
        return view('forum.support-edit', ['id' => $editId]);
    }

    public function update(Request $request, $id)
    {
        $support = Support::findOrFail($id);
        $support->subject       = $request->input('subject');
        $support->status        = $request->input('status');
        $support->description   = $request->input('description');

        $update = $support->save();
        if ($update) {
            Session::flash('atualizado');
            return redirect()->route('forum.index');
        }
    }

    public function view($id)
    {
        $registro = DB::table('supports')->select('subject', 'status', 'description')->where('id', '=', $id)->get();
        return view('forum.support-details', ['details' => $registro]);
    }


    public function store(Request $request)
    {
        $materia        = $request->subjects;
        $description    = $request->description;
        $idUser         = auth()->user()->id;

        DB::table('supports')->insert([
            'subject'       => $materia,
            'description'   => $description,
            'user_id'       => $idUser
        ]);

        return redirect('forum');
    }


}
