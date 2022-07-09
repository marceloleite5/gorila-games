<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index(){

        $messages = Message::all('id')->count();
        $messages2 = Message::all();

        //$categorias = Categoria::all('id')->count();
        $gamesc = Game::all('id')->count();

        $users2 = User::orderBy('email', 'desc')->get();
        //$banners = Banner::orderBy('nome', 'asc')->get();//ordenar por ordem alfabetica

        $search = request('search');

        if($search){
            $users2 = User::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $users2 = User::all()->sortByDesc("name");
        }
        return view('dashboard.users.index',
         ['users2' => $users2,
         'messages'=> $messages,
         'messages2' => $messages2,
         'gamesc' => $gamesc,
         'search' => $search]);
    }

    public function create(){

        $users2 = User::all();

        $messages = Message::all('id')->count();
        $messages2 = Message::all();

        //$categorias = Categoria::all('id')->count();
        $gamesc = Game::all('id')->count();


        return view('dashboard.users.create' ,
         ['users2' => $users2,
         'messages'=> $messages,
         'messages2' => $messages2,
         'gamesc' => $gamesc,
        ]);
    }

    public function store(Request $request)
    {
        $user2 = new User;

        $user2->name = $request->name;
        $user2->email = $request->email;
        //$user->confirm = $request->confirm;
        $user2->password = $request->password;

        if($request->confirm === $request->password ){
            $user2->password = bcrypt($request->password);
            $user2->save();
            return redirect('/dashboard/users')->with('msg', 'Usuário salvo com sucesso!');
        }else{
            return redirect('/dashboard/users')->with('msg', 'A senhas não são iguais!');
        }

    }

    //public function show(Request $request) {

      //  Auth::logout();

        //return redirect('login');

      //}

    public function destroy($id){

        User::findOrFail($id)->delete();

        return redirect('/dashboard/users')->with('msg', 'Usuário excluído com sucesso!');
    }

}
