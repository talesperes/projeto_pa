<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_Model extends MY_Model
{
	public $table = 'chat';
	public $primary_key = 'id_chat';
	public $fillable = array('id_chat', 'mensagem', 'fk_c_usuario', 'fk_c_projeto');
	public $protected = array();

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

	public function getUsuarioChat($id_projeto)
	{
		$this->_database->select("c.*");
		$this->_database->select("u.nome");
		$this->_database->select("u.imagem");
		
		$this->_database->from('chat c');
		$this->_database->join('usuario u', 'u.id_usuario = c.fk_c_usuario');

		$this->_database->where('c.fk_c_projeto', $id_projeto);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

}