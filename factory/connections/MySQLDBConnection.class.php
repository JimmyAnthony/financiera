<?php

/**
 * 
 * @author 
 * @version 1.0
 *
 */

class MySQLDBConnection {
	
	//static private $instance;
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "estadistica";
	private $links;
	private $result;
	
	public function __construct() {
		$this->links = mysql_pconnect($this->hostname, $this->username, $this->password)or die("error al tratar de conectar con el servidor");
		//print "La conexi&oacute;n es $this->links<br />";
		if (!$this->links) {
			mysql_error();
		}
		
		$db_selected = mysql_select_db($this->database, $this->links);
		
		if (!$db_selected) {
			mysql_error();
		}
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
		unset($this->result);
		//echo $query;
		$this->result = mysql_query($query, $this->links)or die("problemas al tratar de hacer la consulta");
		/*while($rs = mysql_fetch_array($this->result)){
			echo $rs[6].$rs[2].$rs[3].$rs[5].$rs[4]."<br>";
		}*/
		if (!$this->result) {
			print "No se obtuvo Resultado <br />";
			return false;
		}
		//print "Se obtuvo Result $this->result<br />";
		/*$array = array();
		while($xim = @mssql_fetch_array($this->result)){
			
            array_push($array,$xim);
			
         }*/
		/* $array = array();
		while($rs = mysql_fetch_array($this->result)){
			 array_push($array,$rs);
		}
		 //var_export($this->fetchArray());*/
		$array00 = array();
        while($rs = mysql_fetch_array($this->result)){
            $array00[]=$rs;
        }
		return $array00;
	}
	public function execute_xim($query) {
		unset($this->result);
		$this->result = mysql_query($query, $this->links)or die("problemas al tratar de hacer la consulta");
		if (!$this->result) {
			print "No se obtuvo Resultado <br />";
			return false;
		}
		return $this->result;
	}
	public function numRows() {
		return mysql_num_rows($this->result);
	}
	
	public function affectedRows() {
		return mysql_affected_rows($this->result);
	}

	public function fetchArray() {
		return mysql_fetch_array($this->result);
	}
	
	public function fetchObject() {
		return mysql_fetch_object($this->result);
	}
	public function ul_id(){
		return mysql_insert_id();
	}
	
	public function __destruct() {
		/*
		if ($this->result) {
			mysql_free_result($this->result);
		}
		*/
		mysql_close($this->links);
	}
}
?>