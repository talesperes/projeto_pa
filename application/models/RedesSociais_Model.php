<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RedesSociais_Model extends MY_Model
{
	public $table = 'redes_sociais';
	// public $primary_key = '';
	public $fillable = array('fk_rs_usuario', 'instagram', 'twitter', 'facebook', 'linkedin', 'github');
	// public $protected = array('');

	public function __construct()
	{
		$this->return_as = 'array';
		$this->timestamps = FALSE;
		parent::__construct();
	}

}