<?php
namespace Controllers;

use \Jenssegers\Blade\Blade;
use \Models\Music;

class HomeController{
	private $blade;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views/blog', DIRREQ.'public/cache');
	}

	#index
	public function index(){
		$model = new Music;
		$dados = $model->getMusics();
		echo($this->blade->render('home', compact('dados')));
	}
}