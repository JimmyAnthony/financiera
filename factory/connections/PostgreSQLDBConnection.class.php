<?php

/**
 * 
 * @author 
 * @version 1.0
 *
 */

class PostgreSQLDBConnection {
	
	//static private $instance;
	private $connection;
	private $result;
	
	public function __construct() {
		$this->connection = pg_pconnect("host=localhost port=5432 dbname=gem_pruebas user=postgres password=123456") or die("Connection error!!!");
		//$this->connection = pg_pconnect("host=192.168.1.72 port=5432 dbname=gem_pruebas user=postgres password=des@rrollo2010") or die("Connection error!!!");
	}
	/*
	public static function singleton() {
		if (is_null(self::$instance)) {
			self::$instance = new MySQLDBConnection();
		}
		return self::$instance;
	}
	*/
	/*
	 * CONSULTAS
	 */
	
	public function execute($query) {
		$this->result = pg_query($this->connection,$query);
		
		if (!$this->result) {
			return false;
		}
		return $this->result;
	}
	
	public function numRows() {
		return pg_num_rows($this->result);
	}
	
	public function affectedRows() {
		return pg_affected_rows($this->result);
	}
	
	public function fetchObject() {
		return pg_fetch_object($this->result);
	}
	
	public function fetchArray() {
		return pg_fetch_array($this->result);
	}
	
	public function __destruct() {

		pg_close($this->connection);
	}
}
?>