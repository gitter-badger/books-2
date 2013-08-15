<?php
class Books_author_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_books_author() {
		$query = $this->db->get('books_author');
		return $query->result_array();
	}
	public function get_books_author_by_isbn($isbn) {
		$query = $this->db->get_where('books_author', array('ISBN' => $isbn));
		return $query->result_array();
	}
	public function get_isbn_by_id_author($id_author) {
		$query = $this->db->get_where('books_author', array('id_author' => $id_author));
		return $query->result_array();
	}
}