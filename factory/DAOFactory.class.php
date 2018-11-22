<?php

/**
 * 
 * @author xim
 * @version 1.0
 *
 */
//require_once "connections/PostgreSQLDBConnection.class.php";
require_once "connections/MySQLDBConnection.class.php";
 
abstract class DAOFactory {
	
	public abstract function getAreaDAO();
	public abstract function getCaracteristicaDAO();
	public abstract function getCol_SuperiorDAO();
	public abstract function getColegioDAO();
	public abstract function getFormaDAO();
	public abstract function getGeneroDAO();
	public abstract function getGestionDAO();
	public abstract function getGradoDAO();
	public abstract function getModalidadDAO();
	public abstract function getNivelDAO();
	public abstract function getProgramaDAO();
	public abstract function getUsuarioDAO();
	
	/******/
	public abstract function getDocenteDAO();
	
	public static function getDAOFactory($wichFactory) {
		switch ($wichFactory) {
			case Parameter::MySQL:
				return new MySQLDAOFactory();
				break;
			case Parameter::PostgreSQL:
				return new PostgreSQLDAOFactory();
				break;
		}
	}
	
	public static function getConnection($wichFactory) {
		switch ($wichFactory) {
			case Parameter::MySQL:
				return new MySQLDBConnection();
				break;
			case Parameter::PostgreSQL:
				return new PostgreSQLDBConnection();
				break;
		}
	}
}
?>