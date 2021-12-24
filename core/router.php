<?php
namespace App\Core;
class Router{
	protected $routes = [
		'GET' => [],
		'POST' => []
	];
	public function direct($uri, $requestType){
		if(array_key_exists($uri, $this->routes[$requestType])){
			return $this->callAction(
				...explode('@',$this->routes[$requestType][$uri])
			);
		}

		throw new Exception('no routes defined for this uri');
		
	}
	/**
	 *defines a new GET route
	 *
	 * @param  string $uri
	 * @param  string $contorller
	 * @return void
	 */
	public function get($uri, $controller){
		$this->routes['GET'][$uri] = $controller;
	}

	/**
	 *defines a new POST route
	 *
	 * @param  string $uri
	 * @param  string $contorller
	 * @return void
	 */
	public function post($uri, $controller){
		$this->routes['POST'][$uri] = $controller;
	}

	protected function callAction($controller, $action){
		$AppPath = "App\Controllers\\{$controller}";
		$controllerInstance = new $AppPath;
		if(! method_exists($controllerInstance, $action)){
			throw new Exception("{$controller} does not respond to the action {$action}");
		}
		return $controllerInstance->$action();
	}

	public static function load($files){
		$router = new static;
		require $files;
		return $router;
	}
}