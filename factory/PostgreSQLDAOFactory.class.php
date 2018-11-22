<?php

/**
 * 
 * @author 
 * @version 1.0
 *
 */

class PostgreSQLDAOFactory extends DAOFactory {
	
public function getAreaDAO() {
		return new PostgreSQLAreaDAO();
	}
	
	public function getCaracteristicaDAO() {
		return new PostgreSQLCaracteristicaDAO();
	}
	
	public function getCol_SuperiorDAO() {
		return new PostgreSQLCol_SuperiorDAO();
	}
	
	public function getColegioDAO() {
		return new PostgreSQLColegioDAO();
	}
	
	public function getFormaDAO() {
		return new PostgreSQLFormaDAO();
	}
	
	public function getGeneroDAO() {
		return new PostgreSQLGeneroDAO();
	}
	
	public function getGestionDAO() {
		return new PostgreSQLGestionDAO();
	}
	
	public function getGradoDAO() {
		return new PostgreSQLGradoDAO();
	}
	
	public function getModalidadDAO() {
		return new PostgreSQLModalidadDAO();
	}
	
	public function getNivelDAO() {
		return new PostgreSQLNivelDAO();
	}
	
	public function getProgramaDAO() {
		return new PostgreSQLTurnoDAO();
	}
	
	public function getTurnoDAO() {
		return new PostgreSQLTurnoDAO();
	}
	
	/********* PERSONAL **************/
	
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