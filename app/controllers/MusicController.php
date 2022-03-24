<?php
namespace Controllers;

use \Controllers\RoutesController as Rota;
use \Jenssegers\Blade\Blade;
use \Models\Music;

class MusicController extends Music{
	private $blade;
	public $erros = [];

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views/blog', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$dados = $this->getMusics();
		}else{
			$dados = $this->getMusic($id);
		}

		$dados = $this->getAllMusics();
		return $this->blade->render('allmusic', compact('dados'));
	}



	public function musicSingle(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$this->index();
		}else{
			$dados = $this->getMusic($id);
			$baixados = $this->getBaixados();
			return $this->blade->render('music-single', compact('dados', 'baixados'));
		}

	}
	

	public function download(){
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if($id == null) {
			$this->index();
		}else{
			$this->upDown($id);
			$dados = $this->getMusic($id);
			$baixados = $this->getBaixados();
			header("Location: ".DIRPAGE.'download.php?arquivo=public/musics/'.$dados[0]->music);
		}

	}


	public function add(){
		if (count($_POST) > 0) {
			if (!empty($_POST['nome'] or $_POST['preco'])) {
				$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
				$preco = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT);
				$this->addMusic($nome, $preco);
				flash('add_yes', '<b>Music cadastrado com sucesso!</b>', 'alert alert-success');
				redir("addMusic", false);
			}else{
				$erros = $this->erros;
				array_push($erros, 'Preencha todos os campos');
				return $this->blade->render('addMusic', compact('erros'));		
			}

		}else{
			return $this->blade->render('addMusic');		
		}
	}
	

}