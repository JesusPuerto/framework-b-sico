<?php  
/**
 * controlador de la vista tarea
 */
	class tareasController extends AppController
	{
		/**
		 * metodo constructor
		 */
		public function __construct()
		{
			parent::__construct();
		}
		/**
		 * metodo que carga la vista principal de tareas
		 */
		public function index()
		{
			$tareas = $this->loadModel("tarea");
			$categorias = $this->loadModel("categoria");
			$this->_view->tareas=$tareas->getTareas();
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Pagina principal";
			$this->_view->renderizar("index");
		}
		/**
		 * funciona para agregar una nueva tarea
		 */
		public function agregar()
		{
			if($_POST)
			{
				$tareas = $this->loadModel("tarea");
				$this->_view->tareas = $tareas->agregar($_POST);
				$this->redirect(array("controller"=>"tareas"));
			}
			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();
			$this->_view->titulo="Agregar Tarea";
			$this->_view->renderizar("agregar");
		}

		/**
		 * metodo que permite editar una tarea
		 * @param $id
		 */
		public function editar($id=null)
		{
			if($_POST)
			{
				$tareas = $this->loadModel("tarea");
				$tareas->actualizar($_POST);
				$this->redirect(array("controller"=>"tareas"));
			}
			$tareas = $this->loadModel("tarea");
			$this->_view->tarea = $tareas->buscarPorId($id);

			$categorias = $this->loadModel("categoria");
			$this->_view->categorias=$categorias->getCategorias();

			$this->_view->titulo="Editar Tarea";
			$this->_view->renderizar("editar");
		}

		/**
		 * @param $id
		 * description metodo que permite eliminar una tarea
		 * @return $id
		 * @ignore
		 */
		public function eliminar($id)
		{
			$tarea = $this->loadModel("tarea");
			$registro = $tarea->buscarPorId($id);
			if(!empty($registro))
			{
				$tarea->eliminar($id);
				$this->redirect(array("controller"=>"tareas"));
			}			
		}

		/**
		 * @param $id
		 * @param $status
		 * @internal cambia el estado de una tarea, activa o inactivas
		 */
		public function cambiarEstado($id=null,$status=null)
		{
			$tarea = $this->loadModel("tarea");
			$registro = $tarea->buscarPorId($id);
			if(!empty($registro))
			{
				if($status==0)
				{
					$status=1;
				}
				else
				{
					$status=0;
				}
				$tarea->actualizarEstatus($id,$status);
				$this->redirect(array("controller"=>"tareas"));
			}	
		}
	}
?>