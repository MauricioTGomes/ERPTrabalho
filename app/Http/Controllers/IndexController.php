<?php

namespace App\Http\Controllers;

use App\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	public function register() {
		SEOTools::setTitle('Cadastrar usuário');
		return view('auth/register');
	}

	protected function create(Request $data) {
		try {
			DB::beginTransaction();
			User::create($data->all());
			DB::commit();
			return redirect()->route('index')->with(['sucesso' => "Usuário cadastrada com sucesso."]);
		} catch (\Exception $e) {
			DB::rollBack();
			return back()->with('erro', "Erro ao salvar usuário."."\n".$e->getMessage())->withInput();
		}
	}

	public function index() {
		SEOTools::setTitle('Inicial');
		return view('home/index');
	}

}
