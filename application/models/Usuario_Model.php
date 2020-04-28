<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends MY_Model
{
	public $table = 'usuario';
	public $primary_key = 'id_usuario';
	public $fillable = array('id_usuario', 'nome', 'sexo', 'email', 'celular', 'telefone', 'nascimento', 'fk_u_cidade', 'fk_u_escolaridade', 'descricao', 'habilidade', 'curso_extra', 'pontuacao', 'num_rank', 'foto', 'capa', 'senha');
	public $protected = array('id_usuario');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

}