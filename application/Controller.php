<?php 
	/**
	 * clase que controla y gestiona los controladores
	 */
	abstract class AppController
	{	
		/**
		 * [$_view description]
		 * @var $_view
		 */
		protected $_view;

		/**
		 * constructor que crea la vista
		 */
		public function __construct()
		{
			$this->_view = new View(new Request);
		}
		/**
		 * @internal metodo que llama al index
		 */
		abstract function index();		

		/**
		 * @param  $modelo
		 * @return modelo o exception
		 * @internal metodo que carga el modelo segun la ruta
		 */
		protected function loadModel($modelo)
		{
			$modelo = $modelo."Model";
			$rutaModelo = ROOT."models".DS.$modelo.".php";

			if(is_readable($rutaModelo))
			{
				require_once($rutaModelo);
				$modelo = new $modelo;
				return $modelo;
			}
			else
			{
				throw new Exception("Error al cargar el modelo");
				
			}
		}

		/**
		 * @internal metodo que redirije segun la acion
		 */
		public function redirect($url = array())
		{
			$path = "";
			if ($url["controller"]) {
				$path .= $url["controller"];
			}

			if ($url["action"]) {
				$path .="/".$url["action"];
			}

			header("LOCATION: ".APP_URL.$path);
		}
	}
?>