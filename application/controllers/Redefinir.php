<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redefinir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}

	public function nova_senha($token) {
		
		$this->load->model("Recuperacao_Model");

		$valido = $this->Recuperacao_Model->getRecupecaoValido($token);
	
		if(!$valido) {
			echo "Link inválido!";
		} else {

			$data = (!empty($this->input->post()) ? $this->input->post() : null);

			if(isset($data) && !empty($data)) {

				if($data['senha'] != $data['senha_confirm']) {
					$this->alert->set('alert-danger', 'As senhas precisam ser iguais.');
				} elseif(empty($data['senha']) || empty($data['senha_confirm'])){
					$this->alert->set('alert-danger', 'As senhas não podem ser vazias.');
				} else {

					$this->load->model("Usuario_Model");
					$update = $this->Usuario_Model->update(array('senha' => password_hash($data['senha'], PASSWORD_DEFAULT)),$valido['id_usuario']);
					
					if($update) {
						$this->Recuperacao_Model->where('token', $token)->update(array('valido' => 'N'));
						$this->alert->set('alert-success', 'Sua senha foi redefinida com sucesso.');
					} else {
						$this->alert->set('alert-warning', 'Houve um erro ao tentar redefinir sua senha, tente novamente.');
					}

				}

			}

			$dados['title'] = 'Nova senha';
			$dados['token'] = $token;
			$this->template->load("template/main", "redefinir/nova_senha", $dados);
		}

	}

	public function senha()
	{	

		$data = $this->input->post();

		$this->load->model('Usuario_Model');
		$usuario = $this->Usuario_Model->fields('id_usuario')->where('email', $data['email'])->get();

		if($usuario) {

			$token = md5(uniqid(rand(), true));

			$this->load->model("Recuperacao_Model");
			$this->Recuperacao_Model->insert(array('id_usuario' => $usuario['id_usuario'], 'token' => $token));	

			$this->sendEmailPassword($data['email'], $token);

			$response = "Foi enviado um email para redefinir a senha";

		} else {
			$response = "Esse email nao esta cadastrado";
		}

		echo json_encode($response);

	}

	private function sendEmailPassword($email, $token)
	{

		$smtp['host'] = 'HOST';
		$smtp['port'] = 'PORTA';
		$smtp['user'] = 'USER';
		$smtp['pass'] = 'PASSWORD';
		$smtp['crypto'] = 'ssl';

		$link = site_url('redefinir/nova_senha/'.$token);
		$assunto = 'Redefinir Senha - NALUTA';
		$mensagem = "Clique no link para redefinir sua senha: <a href='".$link."'>".$link."</a> (expira em 24 horas)";

		$config = array(
		'protocol'  => 'smtp',
		'smtp_host' => $smtp['host'],
		'smtp_port' => $smtp['port'],
		'smtp_user' => $smtp['user'],
		'smtp_pass' => $smtp['pass'],
		'mailtype'  => 'html',
		'charset'   => 'UTF-8',
		'smtp_crypto' => $smtp['crypto'],
		'smtp_timeout' => 60,
		'smtp_debug' => 1
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from($smtp['user'], 'NALUTA');
		$this->email->to($email);

		$this->email->subject($assunto);
		$this->email->message($mensagem);

		$result = $this->email->send();

		// debugger
		// if(!$result){
		// 	echo json_encode($this->email->print_debugger());
		// }

	} 

}