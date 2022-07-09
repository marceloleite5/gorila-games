<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Game;

class MessagesController extends Controller
{
    public function index(){

        $users = User::all();
        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $messages3 = Message::all();
        $gamesc = Game::all('id')->count();

        $search = request('search');

        if($search){
            $messages3 = Message::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $messages3 = Message::all()->sortBy("nome");
        }

        return view('dashboard.messages.index',
        ['messages' => $messages,
        'search' => $search,
        'messages2' => $messages2,
        'messages3' => $messages3,
        'gamesc' => $gamesc,
        'users' => $users ]);
    }

    public function create(){

        return view('/contatos/contato');
    }

    public function store(Request $request)
    {
        $message = new Message;
        $message->nome = $request->nome;
        $message->email = $request->email;
        $message->assunto = $request->assunto;
        $message->mensagem = $request->mensagem;

        $message->save();

        return  redirect('/contatos/contato')->with('msg', 'Mensagem enviada com sucesso!');
    }

    public function destroy($id){

        Message::findOrFail($id)->delete();

         return redirect('/dashboard/messages')->with('msg', 'Mensagem excluída com sucesso!');
     }
}
