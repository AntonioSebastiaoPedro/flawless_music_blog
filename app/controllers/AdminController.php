<?php

namespace Controllers;

use \Controllers\RoutesController as Rota;
use \Jenssegers\Blade\Blade;
use \Models\Music;
use \Models\User;
use \Src\Classes\Upload;

class AdminController extends Music
{
	private $blade;
	public $erros = [];

	public function __construct()
	{
		$this->blade = new Blade(DIRREQ . 'app/views/admin', DIRREQ . 'public/cache');
	}

	#index
	public function index()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if ($id == null) {
			$dados = $this->getMusics();
		} else {
			$dados = $this->getMusic($id);
			dd($dados);
		}

		$dados = $this->getAllMusics();
		return $this->blade->render('home', compact('dados'));
	}


	public function listar()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if ($id == null) {
			$dados = $this->getAllMusics();
		} else {
			$dados = $this->getMusic($id);
		}

		$dados = $this->getAdminMusics();
		return $this->blade->render('listar', compact('dados'));
	}


	public function entrar()
	{
		$this->load();
		if (count($_POST) > 0) {
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			$user = new User;
			if ($dados = $user->getUser($email, $senha)) {
				$_SESSION['logado'] = true;
				return $this->blade->render('home');
			} else {
				$erros = $user->erros;
				return $this->blade->render('login', compact('erros'));
			}
		} else {
			return $this->blade->render('login');
		}
	}

	public function cadastrar()
	{
		if (count($_POST) > 0) {
			if (isset($_FILES['capa']) and isset($_POST['add'])) {
				if (!empty($_FILES['capa']['name'])) {
					$up =  $upload = Upload::uploadImage($_FILES['capa'], ["jpg", "png", "gif"], "public/img/capas/");
					$upMusica = Upload::uploadImage($_FILES['musica'], ["mp3", "ogg", "mkv"], "public/musics/");
					$musica = $upMusica["dir"];
					if (isset($up['ok']) == true) {
						$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);
						$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
						$participantes =  filter_input(INPUT_POST, 'participantes', FILTER_SANITIZE_STRING);
						$tags =  filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
						$sobre =  filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
						$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
						$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_STRING);
						$lancamento = filter_input(INPUT_POST, 'lancamento', FILTER_SANITIZE_STRING);
						$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
						$dataLan = date("Y-m-d H:i:s", strtotime($lancamento . ' ' . $hora));
						if ($this->addMusic($autor, $titulo, $up['dir'], $musica, $participantes, $tags, $sobre, $tamanho, $dataLan)) {
						} else {
							unlink($up["dir"]);
						}
					} else {
						echo $up['error'];
					}
				}
			}

			return $this->blade->render('home');
		}
		dd('');
	}


	public function editar()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		if (count($_POST) > 0) {
			if (isset($_FILES['capa']) and isset($_POST['add'])) {
				if (!empty($_FILES['capa']['name'])) {
					$up =  $upload = Upload::uploadImage($_FILES['capa'], ["jpg", "png", "gif"], "public/img/capas/");
					$upMusica = Upload::uploadImage($_FILES['musica'], ["mp3", "ogg", "mkv"], "public/musics/");
					$musica = $upMusica["dir"];
					if (isset($up['ok']) == true) {
						$autor = filter_input(INPUT_POST, 'autor', FILTER_SANITIZE_STRING);;
						$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
						$participantes =  filter_input(INPUT_POST, 'participantes', FILTER_SANITIZE_STRING);;
						$tags =  filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);;
						$sobre =  filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);;
						$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);;
						$tamanho = filter_input(INPUT_POST, 'tamanho', FILTER_SANITIZE_STRING);;
						$lancamento = filter_input(INPUT_POST, 'lancamento', FILTER_SANITIZE_STRING);;
						$hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);;
						$dataLan = date("Y-m-d H:i:s", strtotime($hora));
						if ($this->updateMusic($autor, $titulo, $up['dir'], $musica, $participantes, $tags, $sobre, $tamanho, $dataLan, $id)) {
						} else {
							unlink($up["dir"]);
						}
					} else {
						echo $up['error'];
					}
				}
			}

			return $this->blade->render('home');
		} else {
			$dados = $this->getMusic($id);
			return $this->blade->render('edit', compact('dados'));
		}
	}



	public function apagar()
	{
		$id = isset(Rota::parseUrl()[1]) ? Rota::parseUrl()[1] : null;
		$musica = $this->getMusic($id);
		$this->deleteMusic($id);
		unlink(DIRREQ . 'public/img/capas/' . $musica[0]->capa);
		unlink(DIRREQ . 'public/musics/' . $musica[0]->music);
		flash('delete_yes', '<b>Música eliminado com sucesso!</b>', 'alert alert-success');
		redir("listar", false);
	}


	public function sair()
	{
		session_destroy();
		redir("", false);
	}

	public function inscritos()
	{
		return $this->blade->render('news');
	}

	public function mensagens()
	{
		return $this->blade->render('mensagens');
	}


	public function load($value = '')
	{
		require DIRREQ . 'opt/load.php';
	}
}
