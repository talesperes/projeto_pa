<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$dados['title'] = 'Projetos';
		$this->template->load("template/main", "projeto/index", $dados);
	}

	public function criar_projeto()
	{
		$dados['title'] = 'Criar Projeto';
		$this->template->load("template/main", "projeto/criar_projeto", $dados);
	}

}