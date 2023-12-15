<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Session;


class AnswerController extends Controller
{
    public function create($id, $user, $subject, $description)
    {
        // dd($id, $user, $subject, $description);
        $idUser = auth()->user()->id;

        $myanswers = Answer::select('answers.id', 'answer','users.name', 'support_id')
                            ->leftJoin('users', 'answers.user_id', 'users.id')
                            ->where('support_id', $id)->get();

        return view('answer.answer-create', ['id' => $id, 'user' => $user, 'subject' => $subject, 'description' => $description], ['myanswers' => $myanswers]);       
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user()->id;
        
            $insert = Answer::create([
                'answer' => $request->answer,
                'user_id' => $user,
                'support_id' => $request->idsupport
            ]);
            Session::flash('respostaSuccess', 'Resposta enviada com sucesso');
            return redirect()->route('forum.index');

        } catch (\Throwable $th) {
            echo '<pre>';
            var_dump($th->getMessage());
            echo '</pre>';
            die();
        }

        
    }
}
