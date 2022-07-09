<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Game;
use App\Models\Banner;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $messages = Message::all();

        $categorias = Categoria::all();

        $games = Game::all()->sortBy("nome");

        $banners = Banner::all()->sortBy("nome");

        return view('index',
        ['categorias' => $categorias,
        'games' => $games,
        'banners' => $banners,
        'messages' => $messages ]);
    }

    public function dashboard()
    {
        $messages = Message::all('id')->count();
        $messages2 = Message::all();

        $categorias = Categoria::all('id')->count();
        $gamesc = Game::all('id')->count();

        $users = User::all();
        //$banners = Banner::where('id');
        //$banners = Banner::all();
        //$banners = Banner::orderBy('nome', 'asc')->get();//ordenar por ordem alfabetica
        //$banners = Banner::orderBy('nome', 'desc')->get();//ordenar por ordem descendente
        $banners = Banner::all('id')->count();

        return view('dashboard.index',[
        'users'=> $users,
        'categorias'=> $categorias,
        'messages'=> $messages,
        'messages2' => $messages2,
        'gamesc' => $gamesc,
        'banners' => $banners]);
    }


}
