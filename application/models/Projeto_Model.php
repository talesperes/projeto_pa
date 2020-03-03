<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projeto_Model extends MY_Model
{
	public $table = 'projeto';
	public $primary_key = 'id_projeto';
	public $fillable = array();
	public $protected = array('id_projeto');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

}