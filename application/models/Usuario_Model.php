<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends MY_Model
{
	public $table = 'usuario';
	public $primary_key = 'id_usuario';
	public $fillable = array('id_usuario', 'nome', 'sexo', 'email', 'telefone', 'nascimento', 'cidade', 'estado', 'fk_u_cidade', 'fk_u_escolaridade', 'descricao', 'habilidade', 'curso_extra', 'pontuacao', 'num_rank', 'foto', 'capa', 'senha', 'instagram', 'twitter', 'github', 'facebook', 'linkedin','imagem', 'biografia');
	public $protected = array('id_usuario');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

	public function getUsuario($id_usuario)
	{
		$this->_database->select('id_usuario');
		$this->_database->select('nome');
		$this->_database->select('email');
		$this->_database->select('telefone');
		$this->_database->select('cidade');
		$this->_database->select('estado');
		$this->_database->select('imagem');
		$this->_database->select('biografia');
		$this->_database->select('pontuacao');
		$this->_database->select('(SELECT COUNT(*)+1 FROM usuario where pontuacao > (SELECT pontuacao from usuario WHERE id_usuario = '.$id_usuario.')) posicao_rank');
		$this->_database->select('TIMESTAMPDIFF(YEAR, nascimento, CURDATE()) as idade');

		$this->_database->from('usuario');

		$this->_database->where('id_usuario', $id_usuario);

		$query = $this->_database->get();

		if($query->num_rows() > 0)
			return $query->row_array();
		else
			return null;
	}

}