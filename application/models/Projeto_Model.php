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

		if(isset($filtros['area']) && !empty($filtros['area'])) {

			if($filtros['area'] == 'arquitetura')
				$this->_database->where("p.categoria", 'Arquitetura');
			elseif($filtros['area'] == 'biologia')
				$this->_database->where("p.categoria", 'Biologia');
			elseif($filtros['area'] == 'computacao')
				$this->_database->where("p.categoria", 'Computação');
			elseif($filtros['area'] == 'engenharia')
				$this->_database->where("p.categoria", 'Engenharia');
			elseif($filtros['area'] == 'psicologia')
				$this->_database->where("p.categoria", 'Psicologia');

		}
		
		if(isset($filtros['order']) && !empty($filtros['order'])) {

			if($filtros['order'] == 'alfabetica')
				$this->_database->order_by('p.titulo');
			elseif($filtros['order'] == 'novo')
				$this->_database->order_by('p.id_projeto desc');
			elseif($filtros['order'] == 'antigo')
				$this->_database->order_by('p.id_projeto asc');

		}

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

		if(isset($filtros['area']) && !empty($filtros['area'])) {

			if($filtros['area'] == 'arquitetura')
				$this->_database->where("p.categoria", 'Arquitetura');
			elseif($filtros['area'] == 'biologia')
				$this->_database->where("p.categoria", 'Biologia');
			elseif($filtros['area'] == 'computacao')
				$this->_database->where("p.categoria", 'Computação');
			elseif($filtros['area'] == 'engenharia')
				$this->_database->where("p.categoria", 'Engenharia');
			elseif($filtros['area'] == 'psicologia')
				$this->_database->where("p.categoria", 'Psicologia');

		}

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

	public function getNotificacao($id_usuario, $limit = null, $start = null)
	{
		$this->_database->select("count(*) as qtd");

		$this->_database->from("usuario_projeto up");
		
		$this->_database->where("fk_up_projeto = p.id_projeto");
		$this->_database->where("up.status",'Aguardando');

		$subQuery = $this->_database->get_compiled_select();

		$this->_database->select('p.id_projeto');
		$this->_database->select('p.titulo');
		$this->_database->select('('.$subQuery.') qtd');

		$this->_database->from('projeto p');

		$this->_database->where('fk_p_usuario', $id_usuario);
		$this->_database->where('status', 'Aberto');
		$this->_database->where('('.$subQuery.') > 0');

		if($limit !== null && $start !== null)
			$this->_database->limit($limit, $start);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->result_array();
		else
			return null;
	}

	public function countAllNotificacao($id_usuario)
	{
		$this->_database->select("count(*) as qtd");

		$this->_database->from("usuario_projeto up");
		
		$this->_database->where("fk_up_projeto = p.id_projeto");
		$this->_database->where("up.status",'Aguardando');

		$subQuery = $this->_database->get_compiled_select();

		$this->_database->select('p.id_projeto');
		$this->_database->select('p.titulo');
		$this->_database->select('('.$subQuery.') qtd');

		$this->_database->from('projeto p');

		$this->_database->where('fk_p_usuario', $id_usuario);
		$this->_database->where('status', 'Aberto');
		$this->_database->where('('.$subQuery.') > 0');

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}

}