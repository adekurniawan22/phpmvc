<?php 
	error_reporting(0);
	class App{
		protected $controller = 'Home';
		protected $method = 'index';
		protected $params = [];

		public function __construct(){
			$url = $this->parseURL();

			$len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;
			//controller
			if(file_exists('../app/controllers/' . $url[0] . '.php')){
				$this->controller = $url[0];
				unset($url[0]);
			}

			require_once '../app/controllers/' . $this->controller . '.php';
			$this->controller = new $this->controller;

			//method
			if( isset($url[1]) ){
				if(method_exists($this->controller, $url[1])){
					$this->method = $url[1];
					unset($url[1]);
				}
			}

			//parameters
			if( !empty($url)){
				$this->params = array_values($url);
			}

			//Jalankan controller dan method, serta parameter jika ada
			call_user_func_array([$this->controller, $this->method], $this->params);
			
		}

		public function parseUrl(){
			if(isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
				$url = filter_var($url, FILTER_SANITIZE_URL);
				$url = explode('/', $url);
				return $url;
			}
		}
	}

 ?>