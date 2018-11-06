<?php  
	/**
	 * Clase de conexion de la base de datos
	 * 
	 * 
	 * 
	 */
	class Database extends PDO
	{
		/**
		 *metodo constructor de la base de datos
		 */
		public function __construct()
		{
			parent::__construct(
				'mysql:host='.DB_HOST.';'.
				'dbname='.DB_NAME,
				DB_USER,
				DB_PASS,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES '.DB_CHAR
				)
			);
		}
	}
?>