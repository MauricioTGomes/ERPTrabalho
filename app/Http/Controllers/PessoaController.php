<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Http\Requests\PessoaRequest;
use Artesaos\SEOTools\Facades\SEOTools;
use App\Pessoa;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
use Yajra\DataTables\Facades\DataTables;

class PessoaController extends Controller {

    private $pessoaModel;

	public function __construct(Pessoa $pessoa) {
	    $this->pessoaModel = $pessoa;
		$this->middleware('auth');
	}

	public function gravar(PessoaRequest $request){
        try {
            DB::beginTransaction();
	        Pessoa::create($request->all());
            DB::commit();
            return redirect()->route('pessoas.listar')->with(['sucesso' => "Sucesso ao gravar pessoa"]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('erro', 'Erro ao gravar pessoa' . "\n" . $e->getMessage());
        }

    }

    public function deletar($id){
        try {
            DB::beginTransaction();
            if (false) {
                throw new Exception("pessoa com contas em aberto");
            }
            $this->pessoaModel->find($id)->delete();
            DB::commit();
            return response()->json(['erro' => 0, 'mensagem' => "Sucesso ao eliminar pessoa"]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['erro' => 1, 'mensagem' => "Erro ao eliminar, " . $exception->getMessage()]);
        }
    }

    public function update($id, PessoaRequest $request){
        try {
            DB::beginTransaction();
            $pessoa = $this->pessoaModel->find($id);
            $pessoa->update($request->all());
            DB::commit();
            return redirect()->route('pessoas.listar')->with(['sucesso' => "Sucesso ao editar pessoa"]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('erro', 'Erro ao editar pessoa' . "\n" . $e->getMessage());
        }

    }

    public function listar() {
        SEOTools::setTitle('Listagem de pessoas');
        return view('pessoas/listar');
    }

    public function getFormIncluir(Cidade $cidade){
        SEOTools::setTitle('Adicionar pessoas');
        $cidades = $cidade->all();
        return view('pessoas/adicionar', compact('cidades'));
    }

    public function getFormAlterar($id, Cidade $cidade){
        SEOTools::setTitle('Alterar pessoas');
        $pessoa = $this->pessoaModel->find($id);
        $cidades = $cidade->all();
        return view('pessoas/editar', compact('cidades', 'pessoa'));
    }

    public function datatableAjax()
    {
        $query = $this->pessoaModel->all();
        return Datatables::of($query)
            ->editColumn('nome', function ($registro) {
                return $registro->nomeCompleto();
            })
            ->editColumn('cpf', function ($registro) {
                return $registro->cpfCnpj();
            })
            ->editColumn('fone', function ($registro) {
                return $registro->fone;
            })
            ->addColumn('action', function ($registro) {
                return '    <a a-href="/pessoas/deletar/' . $registro->id . '" title="Excluir"
                           class="btn-confirm-operation btn btn-effect-ripple btn-xs btn-danger"
                           data-original-title="Deletar"><i class="fa fa-times"></i></a>
                           <a href="/pessoas/alterar/' . $registro->id . '" title="Alterar"
                           class="btn btn-effect-ripple btn-xs btn-success"
                           data-original-title="Alterar"><i class="fa fa-pencil"></i></a>';
            })
            ->make(true);
    }

}
