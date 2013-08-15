<?php
class Books_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_books() {
		$query = $this->db->get('books');
		$result = $query->result_array();
		
		$all = array();
		foreach ($result as $result_item) {
			$all[] = array("ISBN" => $result_item['ISBN']);
			$result_books_author =  $this->db->get_where('books_author', array('ISBN' => $result_item['ISBN']))->result_array();
			foreach ($result_books_author as $result_books_author_item) {
				$result_author_name = $this->db->get_where('authors', array('id_author' => $result_books_author_item['id_author']))->result_array()[0];
				$all[] = array("id_author" => $result_books_author_item['id_author'], "author_name" => $result_author_name['firstName']." ".
																									$result_author_name['lastName']);
			}
		}
		print_r($all);
		return $query->result_array();
	}
	public function get_books_by_isbn($isbn) {
		$query = $this->db->get_where('books', array('ISBN' => $isbn));
		return $query->result_array();
	}
}