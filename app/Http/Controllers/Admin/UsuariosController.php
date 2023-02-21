<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{


    public function index()
    {
        $lista = User::all();
        return view('admin.usuarios.index', compact('lista'));
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!$validate) {
            return redirect()
                    ->back()
                    ->with('error', 'Dados inválidos.');
        }

        $dados = $request->all();
        $dados['password'] = Hash::make($request->password);

        $response = User::create($dados);
        if (!$response) {
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao salvar usuário, por favor tente novamente.');
        }

        return redirect()
                    ->back()
                    ->with('success', 'Usuário cadastrado com sucesso.');
    }

    public function show(int $id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return redirect()
                    ->back()
                    ->with('error', 'Usuário não localizado.');
        }

        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(int $id, Request $request)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return redirect()
                    ->back()
                    ->with('error', 'Usuário não localizado.');
        }

        $dados = $request->all();
        $dados['password'] = Hash::make($request->password);

        $response = $usuario->update($dados);
        if (!$response) {
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao salvar usuário, por favor tente novamente.');
        }

        return redirect()
                    ->route('usuarios')
                    ->with('success', 'Usuário atualizado com sucesso.');
    }

    public function delete(Request $request)
    {
        $usuario = User::find($request->idReg);
        if (!$usuario) {
            return redirect()
                    ->back()
                    ->with('error', 'Usuário não localizado.');
        }

        $response = $usuario->delete();
        if (!$response) {
            return redirect()
                    ->back()
                    ->with('error', 'Falha ao deletar usuário, por favor tente novamente.');
        }

        return redirect()
                    ->back()
                    ->with('success', 'Usuário deletado com sucesso.');
    }
}
