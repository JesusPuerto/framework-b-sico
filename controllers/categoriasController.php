<?php 
	/**
	 * Controlador de la vista categoria
	 */
	class categoriasController extends AppController
	{
	    
	    /**
	     * metodo constructor de la clase categoriasController
	     */
		public function __construct()
		{
			parent::__construct();
		}

		/**
		 * metodo index para cargar la vista principal de categorias
		 */
		
		public function index()
		{
			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("index");
		}

		/**
		 * meotodo que permite agregar una nueva categoria
		 */
		
		public function agregar(){

			if($_POST)
			{
				$categoria = $this->loadModel("categoria");
			    $categoria->agregar($_POST);
				$this->redirect(array("controller"=>"categorias"));
			}
			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("agregar");
		}
        /**
         * metodo que permite modificar y actualizar los datos de una categoria
         * @param  id
         * @return retorna la id de la categoria
         */
		public function actualizar($id=null){

			if ($_POST) {
				$categoria = $this->loadModel("categoria");
				$categoria->actualizar($_POST);
				$this->redirect(array("controller"=>"categorias"));
			}

			$categoria = $this->loadModel("categoria");
			$this->_view->categoria=$categoria->buscarPorId($id);

			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();

			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("editar");
		}
		/**
		 * metodo que permite la eliminacion de una categoria
		 * @param id 
		 * @return id
		 */
		/*public function eliminar($id){
			$categoria = $this->loadModel("categoria");
			$registro = $categoria->buscarPorId($id);
			if(!empty($registro))
			{
				$categoria->eliminar($id);
				$this->redirect(array("controller"=>"categorias"));
		}*/
	}