<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();

        return view('user.index')->with(['users' => $users]);
    }

    public function profile(){
        $user = $user = User::findOrFail(Auth::user()->id);
        return view('user.profile')->with(['user' => $user]);
    }

    public function destroy($id)
    {
        if(Auth::user()->id == $id)
            return redirect()->action([UserController::class, 'index'])->with('error', 'Não é possível excluir o usuário que está logado.');
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->action([UserController::class, 'index'])->with('status', 'Usuário excluído com sucesso!');
    }

    protected function register(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->action([UserController::class, 'index'])->with('status', 'Usuário cadastrado com sucesso!');
    }


    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit')->with(['user' => $user]);
    }

    protected function save(Request $request)
    {
        $user = User::findOrFail($request['id']);
        $user->name = $request['name'];
        $user->save();
        if(Auth::user()->id == $user->id)
            return redirect()->action([UserController::class, 'profile'])->with('status', 'Usuário atualizado com sucesso!');
        return redirect()->action([UserController::class, 'index'])->with('status', 'Usuário atualizado com sucesso!');
    }

    public function changepassword(Request $request) {
        
        if(!Hash::check($request['old_password'],Auth::user()->password))
            return redirect()->action([UserController::class, 'changepassword'])->with('error', 'A senha atual não corresponde à senha salva no banco.');
        if($request['password'] != $request['password_confirmation'])
            return redirect()->action([UserController::class, 'changepassword'])->with('error', 'A confirmação de senhaestá incorreta.');
        
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect()->action([UserController::class, 'profile'])->with('status', 'Senha alterada com sucesso.');    }

}
