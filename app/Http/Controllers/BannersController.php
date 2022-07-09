<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\User;
use App\Models\Banner;
use App\Models\Game;
use App\Models\Message;

class BannersController extends Controller
{
    private $banner;

    public function __construct(Banner $banner, Categoria $categoria)
    {
        $this->banner = $banner;
        $this->categoria = $categoria;
    }

    public function index(){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();

        $users = User::all();

        $search = request('search');

        if($search){
            $banners = Banner::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $banners = Banner::all()->sortBy("nome");
        }

        return view('dashboard.banners.index',
                    ['banners' => $banners,
                    'messages'=> $messages,
                    'messages2' => $messages2,
                    'gamesc' => $gamesc,
                    'search' => $search,
                    'users' => $users]);
    }

    public function create(){
        $users = User::all();
        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();
        $search = request('search');

        if($search){
            $banners = Banner::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $banners = Banner::all()->sortBy("nome");
        }
        $categorias = Categoria::all();

        $categorias = $this->categoria
                    ->orderBy('nome', 'ASC')
                    ->get();

        return view('dashboard.banners.create',
                    ['banners' => $banners,
                    'messages'=> $messages,
                    'messages2' => $messages2,
                    'gamesc' => $gamesc,
                    'search' => $search,
                    'users' => $users,
                    'categorias' => $categorias]);
    }

    public function store(Request $request){
        $banner = new Banner;
        $banner->nome = $request->nome;
        $banner->categoria_id = $request->categoria_id;
        $banner->categoria = $request->categoria;
        $banner->arquivo = $request->arquivo;
        $banner->link = $request->link;
        $banner->idioma = $request->idioma;
        $banner->desenvolvedor = $request->desenvolvedor;
        $banner->plataforma = $request->plataforma;
        $banner->senha = $request->senha;
        $banner->data = $request->data;

        //Image Upload
        if($request->hasfile('imagem') && $request->file('imagem')->isValid()){

            $requestImage = $request->imagem;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()  . strtotime("now")) .  "." . $extension;

            $requestImage->move(public_path('img/game'), $imageName);

            $banner->imagem = $imageName;

        }
        $banner->save();

        return  redirect('/dashboard/banners')->with('msg', 'Arquivo salvo com sucesso!');
    }

    public function edit($id){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();
        $gamesc = Game::all('id')->count();

        $users = User::all();

        $banners = Banner::findOrFail($id);

        return view('dashboard.banners.edit',
        ['banners' => $banners,
        'messages'=> $messages,
        'messages2' => $messages2,
        'gamesc' => $gamesc,
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

        Banner::findOrFail($request->id)->update($data);

        return redirect('dashboard/banners')->with('msg', 'Arquivo atualizado com sucesso!');
    }

    public function destroy($id){

        Banner::findOrFail($id)->delete();

         return redirect('/dashboard/banners')->with('msg', 'Arquivo excluído com sucesso!');
     }

     public function show($id){

         $users = User::all();

         $categorias = Categoria::all();

         $banner = Banner::all();

         return view('dashboard.banners.show', ['banner'=> $banner, 'users'=> $users, 'categorias' => $categorias]);
     }
}
