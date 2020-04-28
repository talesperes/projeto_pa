<?php

if($this->session->userdata('logado')) {
	echo "Bem vindo, ".$this->session->userdata('nome');
}

?>