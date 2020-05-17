<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{

		$this->load->model("Usuario_Model");
		$dados['rankingUsuarios'] = $this->Usuario_Model->fields(array('id_usuario', 'nome', 'pontuacao'))->order_by('pontuacao', 'desc')->get_all();

		$dados['title'] = 'Ranking';
		$this->template->load("template/main", "ranking/index", $dados);
	}

}