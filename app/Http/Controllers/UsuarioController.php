<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsuarioController extends Controller
{
    public function listar()
    {
        $usuarios = User::all();
        $view = ['usuarios' => $usuarios];

        foreach ($usuarios as $usuario) {
            if ($usuario->user_type == 0) {
                $usuario->user_type = 'Cliente';
            }
            elseif ($usuario->user_type == 1) {
                $usuario->user_type = 'Administrador';
            }
        }

        return view('usuarios.listar', $view);
    }

    public function formularioCadastro()
    {
        $usuario = new User();
        $view = ['usuario' => $usuario];

        return view('usuarios.cadastrar', $view);
    }

    public function salvar(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $numeroErros = 0;
        $erros = [];

        if ($form['user_type'] == 0) {
            $numeroErros += 1;
            array_push($erros, 'tipo de usuário');
        }

        if (strlen($form['name']) < 2) {
            $numeroErros += 1;
            array_push($erros, 'nome');
        }

        if (strlen($form['document']) < 11){
            $numeroErros += 1;
            array_push($erros, 'documento');
        }

        if (strlen($form['phone_number']) < 8){
            $numeroErros += 1;
            array_push($erros, 'celular');
        }

        if (strlen($form['email']) == 0){
            $numeroErros += 1;
            array_push($erros, 'e-mail');
        }

        if (strlen($form['password']) < 6){
            $numeroErros += 1;
            array_push($erros, 'senha');
        }

        if (isset($form['notify'])) {
            if (strlen($form['chat_id']) < 9) {
                $numeroErros += 1;
                array_push($erros, 'chat id');
            }
        }

        if ($numeroErros > 0) {
            $erros = implode(', ', $erros);
            
            $request->session()->flash('alert-error', 'Verfique os campos (' . $erros . ') e tente novamente.');
            return redirect()->back()->withInput($request->all());
        }

        $form['password'] = bcrypt($form['password']);
        $form['user_type'] = $form['user_type'] - 1;
        $form['notify'] = isset($form['notify']) ? $form['notify'] : 0;

        try {
            if (empty($form['id'])) {
                User::create($form);
            }
            else {
                User::whereId($form['id'])->update($form);
            }
        }
        catch(\Exception $e) {
            return redirect()->back()->withInput($request->all());
        }

        return redirect('usuarios/');
    }

    public function editar($id)
    {
        $usuario = User::find($id);
        $usuario->user_type = $usuario->user_type + 1;

        $view = ['usuario' => $usuario];

        return view('usuarios.cadastrar', $view);
    }

    public function deletar ($id)
    {
        User::whereId($id)->delete();
        return redirect('usuarios/');
    }
}