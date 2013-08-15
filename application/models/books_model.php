<?php
class Books_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_books() {
		$query = $this->db->get('books');
		return $query->result_array();
	}
	public function delete_book($isbn) {
		$this->db->delete('books', array('ISBN' => $isbn));
	}
	public function create_book($title, $image, array $id_genres, array $id_authors)
	{
			
		$data = array(
				'title' => $title,
				'image' => $image
		);
		$this->db->insert('books', $data);
		$isbn = $this->db->insert_id();
		foreach ($id_genres as $id_genres_item) {
			$data_genres = array(
								'ISBN' => $isbn,
								'id_genre' => $id_genres_item);
			$this->db->insert('books_genre', $data_genres);
		}
		
		foreach ($id_authors as $id_authors_item) {
			$data_authors = array(
					'ISBN' => $isbn,
					'id_author' => $id_authors_item);
			$this->db->insert('books_author', $data_authors);
		}
	}
	public function get_book_by_isbn($isbn) {
		$query = $this->db->get_where('books', array('ISBN' => $isbn));
		return $query->row();
	}
	public function update_book($isbn, $title, $image, array $id_genres, array $id_authors) {
		if ($image != "")  {
				$data = array(
						'title' => $title,
						'image' => $image
				);
			$this->db->where('ISBN', $isbn);
			$this->db->update('books', $data);
		} else {
			$data = array(
					'title' => $title,
			);
			$this->db->where('ISBN', $isbn);
			$this->db->update('books', $data);
		}
		$this->db->delete('books_author', array('ISBN' => $isbn));
		$this->db->delete('books_genre', array('ISBN' => $isbn));
		
		foreach ($id_genres as $id_genres_item) {
			$data_genres = array(
					'ISBN' => $isbn,
					'id_genre' => $id_genres_item);
			$this->db->insert('books_genre', $data_genres);
		}
		
		foreach ($id_authors as $id_authors_item) {
			$data_authors = array(
					'ISBN' => $isbn,
					'id_author' => $id_authors_item);
			$this->db->insert('books_author', $data_authors);
		}
	}
	
	
}