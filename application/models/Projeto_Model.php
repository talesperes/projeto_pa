<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto_Model extends MY_Model
{
	public $table = 'projeto';
	public $primary_key = 'id_projeto';
	public $fillable = array('titulo', 'categoria', 'descricao', 'num_pessoas', 'status', 'imagem', 'fk_p_usuario');
	public $protected = array('id_projeto');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

	public function getMeusProjetos($id_usuario, $limit = null, $start = null)
	{	
		$this->_database->select("p.*");
		$this->_database->select("u.id_usuario");
		$this->_database->from("projeto p");
		$this->_database->join("usuario u", "u.id_usuario = p.fk_p_usuario");
		$this->_database->where("p.fk_p_usuario", $id_usuario);

		if($limit !== null && $start !== null)
			$this->_database->limit($limit, $start);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

	public function countMeusProjetos($id_usuario)
	{	
		$this->_database->from("projeto p");
		$this->_database->where("p.fk_p_usuario", $id_usuario);
		
		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return null;

	}

	public function getProjetos($filtros = array(), $limit = null, $start = null)
	{	
		$this->_database->select("p.*");
		$this->_database->select("u.id_usuario");
		$this->_database->select("u.nome");
		$this->_database->from("projeto p");
		$this->_database->join("usuario u","u.id_usuario = p.fk_p_usuario");

		if(isset($filtros['search']) && !empty($filtros['search']))
			$this->_database->where("p.titulo like '%".$filtros['search']."%'");

		if(isset($filtros['limit']) && !empty($filtros['limit']))
			$this->_database->limit($filtros['limit']);

		if($limit !== null && $start !== null)
			$this->_database->limit($limit, $start);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;

	}

	public function countProjetos($filtros = array())
	{
		$this->_database->from("projeto p");
		$this->_database->join("usuario u","u.id_usuario = p.fk_p_usuario");

		if(isset($filtros['search']) && !empty($filtros['search']))
			$this->_database->where("p.titulo like '%".$filtros['search']."%'");

		if(isset($filtros['limit']) && !empty($filtros['limit']))
			$this->_database->limit($filtros['limit']);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return null;

	}

	public function getProjetoDetalhado($id)
	{
		$this->_database->select("p.id_projeto");
		$this->_database->select("p.titulo");
		$this->_database->select("p.categoria");
		$this->_database->select("p.descricao");
		$this->_database->select("p.num_pessoas");
		$this->_database->select("p.status");
		$this->_database->select("p.imagem as imagem_projeto");
		$this->_database->select("u.nome");
		$this->_database->select("u.id_usuario");
		$this->_database->select("u.imagem");
		$this->_database->select("u.biografia");
		$this->_database->from("projeto p");
		$this->_database->join("usuario u","u.id_usuario = p.fk_p_usuario");

		$this->_database->where("p.id_projeto", $id);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->row_array();
		else
			return null;

	}

}