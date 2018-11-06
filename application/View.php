<?php  

	/**
	 * clase que carga la vista
	 */
	class View
	{
		/**
		 * [$_controlador description]
		 * @var private $_controlador
		 */
		private $_controlador;

		/**
		 *@internal realiza una peticion para elegir que vista cargar
		 * @param Request $peticion 
		 */
		public function __construct(Request $peticion)
		{
			$this->_controlador = $peticion->getController();
		}

		/**
		 * @param  $vista
		 * @param  boolean $item
	     * @internal metodo que permite adaptar la vista cargada
	     * @return exption regresa una string 
		 */
		public function renderizar($vista,$item = false)
		{
			$_layoutParams = array(
				"ruta_css"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/css",
				"ruta_img"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/img",
				"ruta_js"=>APP_URL."views/layout/".DEFAULT_LAYOUT."/js"
			);

			$rutaVista = ROOT."views".DS.$this->_controlador.DS.$vista.".phtml";

			if(is_readable($rutaVista))
			{
				include_once(ROOT."views".DS."layout".DS.DEFAULT_LAYOUT.DS."header.php");
				include_once($rutaVista);
				include_once(ROOT."views".DS."layout".DS.DEFAULT_LAYOUT.DS."footer.php");
			}
			else
			{
				throw new Exception("Vista no encontrada");
				
			}
		}
	}
?>