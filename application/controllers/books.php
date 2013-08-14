<?php
class Books extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('authors_model');
	}
	public function view($page = 'books') {
		if ( ! file_exists('application/views/books/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = "Книги";
		$data['active'] = "books";
		
		$data['books'] = $this->books_model->get_books();
		
		$this->load->view('templates/header', $data);
		$this->load->view('books/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}
