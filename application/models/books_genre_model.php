<?php
class Books_genre_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_books_genre() {
		$query = $this->db->get('books_genre');
		return $query->result_array();
	}
	public function get_books_genre_by_isbn($isbn) {
		$query = $this->db->get_where('books_genre', array('ISBN' => $isbn));
		return $query->result_array();
	}
}