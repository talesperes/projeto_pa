<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function insertMessage($id_projeto)
	{
		$data = $this->input->post();
		$this->load->model("Chat_Model");
		$values = array('mensagem' => $data['msg'], 'fk_c_usuario' => $this->session->userdata('id'), 'fk_c_projeto' => $id_projeto);
		$this->Chat_Model->insert($values);
	}

	public function getMessages($id_projeto)
	{
		$this->load->model('Chat_Model');
		$mensagens = $this->Chat_Model->getUsuarioChat($id_projeto);
		echo json_encode($mensagens);
	}

}