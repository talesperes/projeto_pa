<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recuperacao_Model extends MY_Model
{
	public $table = 'recuperacao';
	public $primary_key = '';
	public $fillable = array('id_usuario', 'token', 'valido', 'created_at', 'updated_at');
	public $protected = array();

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = TRUE;
		parent::__construct();
	}

	public function getRecupecaoValido($token)
	{

		$this->_database->select('r.id_usuario');
	
		$this->_database->from('recuperacao r');
		
		$this->_database->where('TIMESTAMPDIFF(MINUTE, r.created_at, NOW()) <= 1440');
		$this->_database->where('r.valido', 'S');
		$this->_database->where('token', $token);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;

	}

}