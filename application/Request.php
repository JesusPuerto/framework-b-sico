<?php 

	/**
	 * clase 
	 *@return  var
	 * @var $_metodo
	 * @var $_argumentos
	 * @var $_controlador 
	 * @param clase de respuesta de controlador, metodo o argumento
	 */
	class Request
	{
			/**
			 * [$_controlador description]
			 * @var [privado]
			 */
		private $_controlador;

		/**
		 * [$_metodo description]
		 * @var [privado]
		 */
		private $_metodo;

		/**
		 * [$_argumentos description]
		 * @var [privado]
		 */
		private $_argumentos;

		/**
		 * metodo contrusctor de la cadena de URL
		 */
		public function __construct()
		{			
			if(isset($_GET['url']))
			{
				$url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
				$url = explode("/", $url);
				$url = array_filter($url);

				$this->_controlador=strtolower(array_shift($url));
				$this->_metodo=strtolower(array_shift($url));
				$this->_argumentos = $url;

				if(!$this->_controlador)
				{
					$this->_controlador = DEFAULT_CONTROLLER;
				}

				if(!$this->_metodo)
				{
					$this->_metodo = "index";
				}

				if(!$this->_argumentos)
				{
					$this->_argumentos = array();
				}
			}
		}
		/**
		 * metodo que obtiene el controlador y lo retorna
		 * @return _controlador
		 */
		public function getController()
		{			
			return $this->_controlador;
		}

		/**
		 * metodo que obtiene un metodo y lo retornoa
		 * @return _metodo
		 */
		public function getMethod()
		{
			return $this->_metodo;
		}

		/**
		 * metodo que obtiene y retorna los argumentos 
		 * @return _argumentos
		 */
		public function getArgs()
		{
			return $this->_argumentos;
		}
	}
?>