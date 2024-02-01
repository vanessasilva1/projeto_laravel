<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogosController extends Controller
{
    public function index() {
        //dd('Olá mundo');
        //$nome = 'Vanessa dos Santos';
        //$id = 6;
        //return view('jogos.index', ['nome'=>$nome, 'id'=>$id]);
        //$jogos = Jogo::all(); //Pega todos os campos e registros qe tem na tabela jogos
        //dd($jogos);
        $jogos = Jogo::latest()->paginate(10); // Obtém os jogos ordenados pela data de criação e paginados
        return view('jogos.index', ['jogos' => $jogos]);
    }

    public function create() { //tem que retornar uma view de criação
        return view('jogos.create');
    }

    public function store(Request $request) { // está recebendo os parâmetros do formulário
        //dd($request);
        Jogo::create($request->all()); // Salva
        // No seu controlador ou em qualquer lugar onde você esteja executando a consulta
        return redirect()->route('jogos-index'); // Assim que salvar, ele redireciona para o index/listagem
    }

    public function edit($id) {
        $jogos = Jogo::where('id', $id)->first();
        if(!empty($jogos))
        {
            return view('jogos.edit', ['jogos'=>$jogos]);
        }
        else {
            return redirect()->route('jogos-index');
        }
    }

    public function update(Request $request, $id) {
        //dd($id);
        $data = [
            'nome' => $request->nome,
            'categoria' => $request->categoria,
            'ano_criacao' => $request->ano_criacao,
            'valor' => $request->valor,
        ];
        Jogo::where('id',$id)->update($data); //atualiza no banco de dados
        return redirect()->route('jogos-index'); //retorna para a listagem
    }

    public function destroy($id) {
        Jogo::where('id',$id)->delete(); //deleta
        return redirect()->route('jogos-index'); //retorna para a listagem
    }
}
