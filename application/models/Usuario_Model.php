<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends MY_Model
{
	public $table = 'usuario';
	public $primary_key = 'id_usuario';
	public $fillable = array();
	public $protected = array('id_usuario');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

}