<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Game;
use App\Models\Message;

class CategoriasController extends Controller
{
    public function index(){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();


        $users = User::all();

        $search = request('search');

        if($search){
            $categorias = Categoria::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $categorias = Categoria::orderBy("nome", "asc")->get();
        }
        return view('dashboard.categorias.index',
                    ['categorias' => $categorias,
                    'messages'=> $messages,
                    'messages2' => $messages2,
                    'gamesc' => $gamesc,
                    'search' => $search,
                    'users' => $users]);
    }

    public function create(){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();


        $users = User::all();

        return view('dashboard.categorias.create',
         ['users' => $users,
         'messages'=> $messages,
         'messages2' => $messages2,
         'gamesc' => $gamesc,
        ]);
    }

    public function store(Request $request){
        $categoria = new Categoria;

        $categoria->nome = $request->nome;

        $categoria->save();

        return redirect('/dashboard/categorias')->with('msg', 'Categoria cadastrada com sucesso!');
    }

    public function edit($id){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();

        $users = User::all();

        $categoria = Categoria::findOrFail($id);

        return view('dashboard.categorias.edit',
         ['categoria' => $categoria,
         'messages'=> $messages,
         'messages2' => $messages2,
         'gamesc' => $gamesc,
         'users' => $users ]);

    }

    public function update(Request $request){

        $data = $request->all();

        Categoria::findOrFail($request->id)->update($data);

        return redirect('/dashboard/categorias')->with('msg', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id){

        Categoria::findOrFail($id)->delete();

        return redirect('/dashboard/categorias')->with('msg', 'Categoria excluída com sucesso!');
    }
}
