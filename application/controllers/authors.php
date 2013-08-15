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
	
	public function view($id_author) {
		
		$name = $this->authors_model->get_author_by_id($id_author)[0];
		$data['title'] = $name['firstName']." ".$name['lastName'];
		$data['active'] = 'authors';
		$data['books_author'] = $this->authors_model->get_all_author_isbn($id_author);
		
		if (empty($data['books_author']))
		{
			show_404();
		}
		$this->load->view('templates/header', $data);
		$this->load->view('authors/view', $data);
		$this->load->view('templates/footer');
	}
}