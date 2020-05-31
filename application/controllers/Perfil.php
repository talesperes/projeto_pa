<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('logado')) {
        	redirect('inicio');
      	}

	}

	public function index($id = null)
	{

		if(isset($id) && !empty($id))
			$id_usuario = $id;
		else
			$id_usuario = $this->session->userdata('id');

		if(empty($id_usuario))
			redirect('inicio');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->getUsuario($id_usuario);

		if(empty($dados['usuario']))
			redirect('inicio');

		$this->load->model('Escolaridade_Model');
		$dados['escolaridade'] = $this->Escolaridade_Model->where('fk_e_usuario', $id_usuario)->get_all();

		$dados['title'] = 'Meu Perfil';
		$this->template->load("template/main", "perfil/index", $dados);
	}

	public function projetos()
	{

		$id_usuario = $this->session->userdata('id');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->fields(array('imagem', 'id_usuario'))->get($id_usuario);

		$this->load->model('Projeto_Model');
		$count = $this->Projeto_Model->countMeusProjetos($id_usuario);

		$perPage = $this->startPagination('perfil/projetos', $count, 4);
        $page    = ($this->uri->segment(4) ? $this->uri->segment(4) : 1);
        $offset  = ($page - 1) * $perPage;
		$dados["links"]    = $this->pagination->create_links();

		$dados['projetos'] = $projetos = $this->Projeto_Model->getMeusProjetos($id_usuario, $perPage, $offset);

		$dados['title'] = 'Meus Projetos';
		$this->template->load("template/main", "perfil/projetos", $dados);

	}

	public function alterar_perfil($id)
	{
		if(!isset($id) || empty($id) || $id != $this->session->userdata('id'))
			redirect('inicio');

		$this->load->model('Usuario_Model');
		$dados['usuario'] = $this->Usuario_Model->where('id_usuario', $id)->get();
		
		$usuario = (!empty($this->input->post()) ? $this->input->post() : null ); 

		if((!empty($usuario['senha']) || !empty($usuario['senha_cofirm'])) && $usuario['senha'] != $usuario['senha_confirm']){
			$this->alert->set('alert-danger', 'As senhas precisam ser iguais.');
			redirect('perfil/alterar_perfil/'.$id);
		}

		if(!empty($usuario))
		{

			if(!empty($_FILES['img_perfil']['name'])) {

				$dir = 'assets/imagens/usuarios/'.$id;
				$this->startUpload('./' . $dir);

				if (!$this->upload->do_upload('img_perfil')) {
					var_dump($this->upload->display_errors());
					exit;
				}

				$usuario['imagem'] = $this->upload->data()['file_name'];
			}

			$values = array('email' => $usuario['email'], 'nome' => ucwords(strtolower($usuario['nome'])), 'telefone' => $usuario['telefone'], 'sexo' => $usuario['sexo'], 'nascimento' => $usuario['data_nascimento'], 'cidade' => $usuario['cidade'], 'estado' => $usuario['estado'], 'instagram' => $usuario['instagram'], 'twitter' => $usuario['twitter'], 'facebook' => $usuario['facebook'], 'github' => $usuario['github'], 'biografia' => $usuario['biografia']);

			if(!empty($usuario['senha']))
				$values['senha'] = password_hash($usuario['senha'], PASSWORD_DEFAULT);

			if(isset($usuario['imagem']) && !empty($usuario['imagem']))
				$values['imagem'] = $usuario['imagem'];

			$this->Usuario_Model->update($values,$id);

			redirect('perfil/');

		}

		$dados['title'] = 'Alterar Perfil';
		$this->template->load("template/main", "perfil/alterar_perfil", $dados);
	}

	public function getEscolaridade($id_escolaridade) 
	{

		$this->load->model("Escolaridade_Model");
		$dados['escolaridade'] = $this->Escolaridade_Model->get($id_escolaridade);

		$this->load->view("perfil/getEscolaridade", $dados);
	}

	public function salvar_escolaridade($id_escolaridade)
	{
		$data = (!empty($this->input->post()) ? $this->input->post() : null );

		if(isset($data) && !empty($data)) {

			$this->load->model('Escolaridade_Model');
			$update = $this->Escolaridade_Model->update(array('tipo' => $data['nivel-escolaridade'], 'instituicao' => $data['instituicao'], 'curso' => $data['curso'], 'ano_inicio' => $data['ano_inicio'], 'ano_fim' => $data['ano_fim']), $id_escolaridade);

			if($update)
				$this->alert->set('alert-success', 'Formação Acadêmica alterada com sucesso!');
			else
				$this->alert->set('alert-danger', 'Houve um problema ao atualizar a formação acadêmica');

		}

		redirect('perfil');

	}

	public function add_escolaridade()
	{
		$data = (!empty($this->input->post()) ? $this->input->post() : null );

		if(isset($data) && !empty($data)) {

			$this->load->model('Escolaridade_Model');
			$insert = $this->Escolaridade_Model->insert(array('tipo' => $data['nivel-escolaridade'], 'instituicao' => $data['instituicao'], 'curso' => $data['curso'], 'ano_inicio' => $data['ano_inicio'], 'ano_fim' => $data['ano_fim'], 'fk_e_usuario' => $this->session->userdata('id')));

			if($insert)
				$this->alert->set('alert-success', 'Formação Acadêmica adicionada com sucesso!');
			else
				$this->alert->set('alert-danger', 'Houve um problema ao adicionar a formação acadêmica');

		}

		redirect('perfil');
	}

	public function notificacao()
	{

		$this->load->model('Projeto_Model');

		$count = $this->Projeto_Model->countAllNotificacao($this->session->userdata('id'));

		$perPage = $this->startPagination('perfil/notificacao', $count, 6);
        $page    = ($this->uri->segment(4) ? $this->uri->segment(4) : 1);
        $offset  = ($page - 1) * $perPage;
		$dados["links"]    = $this->pagination->create_links();

		$dados['notificacoes'] = $notificacoes = $this->Projeto_Model->getNotificacao($this->session->userdata('id'), $perPage, $offset);

		$dados['title'] = 'Notificações';
		$this->template->load("template/main", "perfil/notificacao", $dados);
	}

}