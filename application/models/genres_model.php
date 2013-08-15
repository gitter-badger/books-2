<?php
class Genres_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}
	public function get_genres() {
		$query = $this->db->get('genres');
		return $query->result_array();
	}
	public function get_genre_by_id($id_genre) {
		$query = $this->db->get_where('genres', array('id_genre' => $id_genre));
		return $query->row();
	}
}