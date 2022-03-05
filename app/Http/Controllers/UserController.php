<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $id = '2';
        $info = [];
        $info['dt_nascimento'] = Auth::user()->dt_born;
        $info['name'] = Auth::user()->name;
        $info['user'] = Auth::user()->user;
        // Auth::user()->social_id == '1'
        if($id == '1')
        {
            $info['user'] = Auth::user()->user;
            $info['type'] = 'Instagram';

        }else{
            $searchType = SocialNetwork::where('id', Auth::user()->social_id)->first();
            $info['user'] = Auth::user()->user;
            $info['type'] = $searchType->name;

        }

        return view('home', ["info"=>$info]);
    }

    public function profile()
    {
        $info = $this->buscaDados();

        return view('profile', ["info"=> $info]);

    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update($request->all());


        return redirect('profile');
    }

    private function buscaDados()
    {
        $dados = [];

        $user = Auth::user();

        $socialNetwork = SocialNetwork::where('id', $user->social_id)->first();

        $dados['name'] = $user->name;
        $dados['cpf'] =  $user->cpf;
        $dados['user'] = $user->user;
        $dados['dt_born'] = $user->dt_born;
        $dados['profile'] = $user->profile;
        $dados['user'] = $user->user;
        $dados['social'] = $socialNetwork->name;
        $dados['social_id'] = $user->social_id;

        return $dados;
    }
}
