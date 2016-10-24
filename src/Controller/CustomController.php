<?php
namespace App\Controller;

use App\Controller\AppController;

class CustomController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->viewBuilder()->layout('custom');
		$this->set('header', "this is custom site");
		$this->set('footer', 'copylight 2016 libro');
	}

	public function index()
	{
		$msg = "これはカスタムアクションです";
		$this->set('message', $msg);	
	}
}