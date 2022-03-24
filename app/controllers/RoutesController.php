<?php
namespace Controllers;

class RoutesController{


	public static function parseUrl($par=null){
		$url = explode('/', $_GET['url'], FILTER_SANITIZE_URL);

		if (!is_null($par)):
			if (array_key_exists($par, $url)):
				return $url[$par];
			else:
				return false;
			endif;
		else:
			return $url;
		endif;
	}

	public function getRoute($request, $action){
		$url = self::parseUrl(0);
		if ($url==$request):
				$actionFianl = explode('@', $action);
				$controller = "\\Controllers\\{$actionFianl[0]}";
				$metodo = $actionFianl[1];
				$instance = new $controller;
				echo call_user_func([$instance, $metodo], self::parseUrl());
		endif;
	}

}