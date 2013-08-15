<?php
class Books extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('authors_model');
		$this->load->model('books_author_model');
		$this->load->model('books_genre_model');
		$this->load->model('genres_model');
	}
	public function index() {
		$data['title'] = "Книги";
		$data['active'] = "books";
		
		$books = $this->books_model->get_books();
		
		$all = array();
		$genres = array();
		$authors = array();
		
		foreach ($books as $books_item) {
			
			$books_genre = $this->books_genre_model->get_books_genre_by_isbn($books_item['ISBN']);
			foreach ($books_genre as $books_genre_item) {
				$genres[] = array("id_genre" => $books_genre_item['id_genre'],
									"title" => $this->genres_model->get_genre_by_id($books_genre_item['id_genre'])->title);
			}	
			
			$books_author = $this->books_author_model->get_books_author_by_isbn($books_item['ISBN']);
			
			foreach ($books_author as $books_author_item) {
				$authors[] = array("id_author" => $books_author_item['id_author'],
						"firstName" => $this->authors_model->get_author_by_id($books_author_item['id_author'])->firstName,
						"lastName" => $this->authors_model->get_author_by_id($books_author_item['id_author'])->lastName);
			}
			
			$all[] = array("ISBN" => $books_item['ISBN'], 
								"title" => $books_item['title'], 
								"image" => $books_item['image'],
								"genres" => $genres, 
								"authors" => $authors);
			$genres = null;
			$authors = null;
		}
		$data['books'] = $all;
		$data['authors'] = $this->authors_model->get_authors();
		$data['genres'] = $this->genres_model->get_genres();
		$this->load->view('templates/header', $data);
		$this->load->view('books/books', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function delete() {
		$isbn = $this->input->post('isbn');
		$this->books_model->delete_book($isbn);
	}
	public function create() {
		$fileName = $_FILES['image']['name'];
		$tmpName  = $_FILES['image']['tmp_name'];
		
		$content = file_get_contents($tmpName);
		
		$title = $this->input->post('title');
		$id_authors = $this->input->post('id_authors');
		$id_genres = $this->input->post('id_genres');
		$this->books_model->create_book($title, $content, $id_genres, $id_authors);
		header('Location: /books/');
	}
	public function update() {
		$fileName = $_FILES['image']['name'];
		$tmpName  = $_FILES['image']['tmp_name'];
		
		if ($fileName != "") {
			$content = file_get_contents($tmpName);
		} else {
			$content = "";
		}
		$isbn = $this->input->post('isbn');
		$title = $this->input->post('title');
		$id_authors = $this->input->post('id_authors');
		$id_genres = $this->input->post('id_genres');
		$this->books_model->update_book($isbn, $title, $content, $id_genres, $id_authors);
		header('Location: /books/');
	}
}
