<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Game;
use App\Models\Message;

class GamesController extends Controller
{
    private $game;

    public function __construct(Game $game, Categoria $categoria)
    {
        $this->game = $game;
        $this->categoria = $categoria;
    }

    public function index(){

        $messages2 = Message::all();
        $messages = Message::all('id')->count();
        $gamesc = Game::all('id')->count();
        $games3 = Game::all();

        $users = User::all();
        $search = request('search');

        if($search){
            $games = Game::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $games = Game::all()->sortBy("nome");
        }

        return view('dashboard.games.index',
                    ['games' => $games,
                    'gamesc'=> $gamesc,
                    'games3' => $games3,
                    'messages'=> $messages,
                    'messages2'=> $messages2,
                    'search' => $search,
                    'users' => $users]);
    }

    public function create(){

        $messages2 = Message::all();
        $messages = Message::all('id')->count();
        $gamesc = Game::all('id')->count();
        $games3 = Game::all();

        $users = User::all();
        $search = request('search');

        if($search){
            $games = Game::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $games = Game::all()->sortByDesc("nome");
        }
        $categorias = Categoria::all();

        $categorias = $this->categoria
                    ->orderBy('nome', 'ASC')
                    ->get();

        return view('dashboard.games.create',
                    ['games' => $games,
                    'gamesc'=> $gamesc,
                    'games3' => $games3,
                    'messages'=> $messages,
                    'messages2'=> $messages2,
                    'search' => $search,
                    'users' => $users,
                    'categorias' => $categorias]);
    }

    public function store(Request $request){
        $game = new Game;
        $game->nome = $request->nome;
        $game->categoria_id = $request->categoria_id;
        $game->categoria = $request->categoria;
        $game->arquivo = $request->arquivo;
        $game->link = $request->link;
        $game->idioma = $request->idioma;
        $game->desenvolvedor = $request->desenvolvedor;
        $game->plataforma = $request->plataforma;
        $game->senha = $request->senha;
        $game->data = $request->data;

        //Image Upload
        if($request->hasfile('imagem') && $request->file('imagem')->isValid()){

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()  . strtotime("now")) .  "." . $extension;

            $requestImage->move(public_path('img/game'), $imageName);

            $game->imagem = $imageName;

        }
        $game->save();

        return  redirect('/dashboard/games')->with('msg', 'Arquivo salvo com sucesso!');
    }

    public function edit($id){


        $messages2 = Message::all();
        $messages = Message::all('id')->count();
        $gamesc = Game::all('id')->count();
        $games3 = Game::findOrFail($id);

        $users = User::all();

        $games = Game::findOrFail($id);

        return view('dashboard.games.edit',
        ['games' => $games,
        'gamesc'=> $gamesc,
        'games3' => $games3,
        'messages'=> $messages,
        'messages2'=> $messages2,
        'users' => $users]);

    }

    public function update(Request $request){

        $data = $request->all();

         //Image Upload
         if($request->hasfile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemName = md5($requestImagem->getClientOriginalName()  . strtotime("now")) .  "." . $extension;

            $requestImagem->move(public_path('img/game'), $imagemName);

            $data['imagem'] = $imagemName;

        }

        Game::findOrFail($request->id)->update($data);

        return redirect('dashboard/games')->with('msg', 'Arquivo atualizado com sucesso!');
    }

    public function destroy($id){

       Game::findOrFail($id)->delete();

        return redirect('/dashboard/games')->with('msg', 'Arquivo excluído com sucesso!');
    }

    public function show($id){

        $users = User::all();

        $categorias = Categoria::all();

        $game = Game::all();

        return view('dashboard.games.show', ['game'=> $game, 'users'=> $users, 'categorias' => $categorias]);
    }
}
