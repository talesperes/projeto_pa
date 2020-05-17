<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto_Model extends MY_Model
{
	public $table = 'projeto';
	public $primary_key = 'id_projeto';
	public $fillable = array();
	public $protected = array('id_projeto');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

	public function getMeusProjetos($id_usuario)
	{
		$this->_database->from("projeto p");
		$this->_database->where("p.fk_p_usuario", $id_usuario);
		
		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

}