<?php
class Pages extends BaseController
{
	public function __construct()
	{
	}

	public function index()
	{
		$data = ['title' => 'Home page'];

		$this->view('index', $data);
	}

	public function sollicitant()
	{
		$this->view('index');
	}
}
