<?php

/**
 * 
 * @author 
 * @version 1.0
 *
 */

class MySQLDAOFactory extends DAOFactory {
	
	public function getAreaDAO() {
		return new MySQLAreaDAO();
	}
	
	public function getCaracteristicaDAO() {
		return new MySQLCaracteristicaDAO();
	}
	
	public function getCol_SuperiorDAO() {
		return new MySQLCol_SuperiorDAO();
	}
	
	public function getColegioDAO() {
		return new MySQLColegioDAO();
	}
	
	public function getFormaDAO() {
		return new MySQLFormaDAO();
	}
	
	public function getGeneroDAO() {
		return new MySQLGeneroDAO();
	}
	
	public function getGestionDAO() {
		return new MySQLGestionDAO();
	}
	
	public function getGradoDAO() {
		return new MySQLGradoDAO();
	}
	
	public function getModalidadDAO() {
		return new MySQLModalidadDAO();
	}
	
	public function getNivelDAO() {
		return new MySQLNivelDAO();
	}
	
	public function getProgramaDAO() {
		return new MySQLTurnoDAO();
	}
	
	public function getTurnoDAO() {
		return new MySQLTurnoDAO();
	}
	
	/***/
	
	public function getDocenteDAO()
	{
		return new PostgreSQLDocenteDAO();
	}
	
     /******* Usuarios ***************/
    public function getUsuarioDAO()
	{
		return new PostgreSQLUsuarioDAO();
	}
}
?>