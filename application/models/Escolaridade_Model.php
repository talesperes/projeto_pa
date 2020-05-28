<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escolaridade_Model extends MY_Model
{
	public $table = 'escolaridade';
	public $primary_key = 'id_escolaridade';
	public $fillable = array('id_escolaridade', 'tipo', 'instituicao', 'curso', 'ano_inicio', 'ano_fim', 'fk_e_usuario');
	public $protected = array();

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

}