<?php
class Authors extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('authors_model');
	}
	
	public function index()	{
		$data['authors'] = $this->authors_model->get_authors();
		$data['title'] = 'Авторы';
		$data['active'] = 'authors';
		$this->load->view('templates/header', $data);
		$this->load->view('authors/authors', $data);
		$this->load->view('templates/footer');
	}
	
}