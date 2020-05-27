<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioProjeto_Model extends MY_Model
{
	public $table = 'usuario_projeto';
	public $primary_key = 'id_usuario_projeto';
	public $fillable = array('fk_up_projeto', 'fk_up_usuario', 'contribuicao', 'status');
	public $protected = array();

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

	public function getSolicitacoesProjeto($id)
	{

		$this->_database->select("u.id_usuario");
		$this->_database->select("u.nome");
		$this->_database->select("u.imagem");
		$this->_database->from("usuario_projeto up");
		$this->_database->join("usuario u", "up.fk_up_usuario = u.id_usuario");

		$this->_database->where("fk_up_projeto", $id);
		$this->_database->where("status", "Aguardando");

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

	public function getQtdParticipantesProjeto($id)
	{
		
		$this->_database->select("count(*) qtd");
		$this->_database->from("usuario_projeto up");

		$this->_database->where("up.fk_up_projeto", $id);
		$this->_database->where("up.status", 'Participando');

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->row_array();
		else
			return null;

	}

}