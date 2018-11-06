
<?php  
	/**
	 * clase modelo que se conecta a la BD
	 */
	class AppModel
	{
		/**
		 * [$_db description]
		 * @var protected $_db
		 */
		protected $_db;

		/**
		 * @internal metodo que crea e instancia la BD
		 */
		public function __construct()
		{
			$this->_db = new Database();
		}
	}
?>