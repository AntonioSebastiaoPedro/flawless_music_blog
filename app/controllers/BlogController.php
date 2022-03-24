<?php
namespace Controllers;

use \Jenssegers\Blade\Blade;

class BlogController{
	private $blade;

	public function __construct(){
		$this->blade = new Blade(DIRREQ.'app/views/blog', DIRREQ.'public/cache');
	}

	#index
	public function sobre(){
		echo($this->blade->render('about'));
	}

	public function contacto(){
		echo($this->blade->render('contact'));
	}
}