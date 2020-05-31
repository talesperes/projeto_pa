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

	public function getUsuariosProjeto($id)
	{
		$this->_database->select("u.id_usuario");
		$this->_database->select("u.nome");
		$this->_database->select("u.imagem");
		$this->_database->from("usuario_projeto up");
		$this->_database->join("usuario u", "up.fk_up_usuario = u.id_usuario");

		$this->_database->where("fk_up_projeto", $id);
		$this->_database->where("status", "Participando");

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;
	}

	public function getAllSolicitacoes($id_usuario, $limit = null, $start = null)
	{
		$this->_database->select('p.id_projeto');
		$this->_database->select('p.titulo');
		$this->_database->select('u.id_usuario');
		$this->_database->select('u.imagem');
		$this->_database->select('u.nome');
		$this->_database->select('u.biografia');

		$this->_database->from('usuario_projeto up');
		
		$this->_database->join("usuario u", "up.fk_up_usuario = u.id_usuario");
		$this->_database->join("projeto p", "up.fk_up_projeto = p.id_projeto");

		$this->_database->where('fk_up_projeto in (select id_projeto from projeto where fk_p_usuario = '.$id_usuario.')');
		$this->_database->where('p.status','Aberto');
		$this->_database->where('up.status','Aguardando');

		if($limit !== null && $start !== null)
			$this->_database->limit($limit, $start);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

	public function countAllSolicitacoes($id_usuario)
	{
		$this->_database->select('p.id_projeto');

		$this->_database->from('usuario_projeto up');
		
		$this->_database->join("usuario u", "up.fk_up_usuario = u.id_usuario");
		$this->_database->join("projeto p", "up.fk_up_projeto = p.id_projeto");

		$this->_database->where('fk_up_projeto in (select id_projeto from projeto where fk_p_usuario = '.$id_usuario.')');
		$this->_database->where('p.status','Aberto');
		$this->_database->where('up.status','Aguardando');

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}

}