<?php
class Authors_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_authors() {
		$query = $this->db->get('authors');
		return $query->result_array();
	}
	public function get_author_by_id($id_author) {
		$query = $this->db->get_where('authors', array('id_author' => $id_author));
		return $query->row();
	}
	public function get_all_author_isbn($id_author) {
		$query = $this->db->get_where('books_author', array('id_author' => $id_author));
		return $query->result_array();
	}
}