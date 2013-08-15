<?php
class Authors extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('authors_model');
		$this->load->model('books_author_model');
		$this->load->model('books_genre_model');
		$this->load->model('genres_model');
		
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
		$name = $this->authors_model->get_author_by_id($id_author);
		$data['title'] =  $name->firstName." ".$name->lastName;
		$data['active'] = 'authors';
		$isbn = $this->books_author_model->get_isbn_by_id_author($id_author);

		$all = array();
		$genres = array();
		$authors = array();
		foreach ($isbn as $isbn_item) {
			
			$books_genre = $this->books_genre_model->get_books_genre_by_isbn($isbn_item['ISBN']);
			foreach ($books_genre as $books_genre_item) {
				$genres[] = array("id_genre" => $books_genre_item['id_genre'],
									"title" => $this->genres_model->get_genre_by_id($books_genre_item['id_genre'])->title);
			}
				
			$books_author = $this->books_author_model->get_books_author_by_isbn($isbn_item['ISBN']);
				
			foreach ($books_author as $books_author_item) {
				$authors[] = array("id_author" => $books_author_item['id_author'],
						"firstName" => $this->authors_model->get_author_by_id($books_author_item['id_author'])->firstName,
						"lastName" => $this->authors_model->get_author_by_id($books_author_item['id_author'])->lastName);
			}
			
			$all[] = array("ISBN" =>  $isbn_item['ISBN'],
					"title" => $this->books_model->get_book_by_isbn($isbn_item['ISBN'])->title,
					"image" => $this->books_model->get_book_by_isbn($isbn_item['ISBN'])->image,
					"genres" => $genres,
					"authors" => $authors);
			
			$genres = null;
			$authors = null;
		}
		$data['books'] = $all;
		$this->load->view('templates/header', $data);
		$this->load->view('authors/view', $data);
		$this->load->view('templates/footer');
	}
}