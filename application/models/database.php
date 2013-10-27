<?php

class Database extends CI_Model{
	public function login($data){
		$user = $data['user'];
		$pass = $data['pass'];
		$output = $this->db->query("SELECT * FROM `user` WHERE `user_name`='$user' && `password`='$pass'");
		return $output->result();
	}
	
	public function category(){
		$output = $this->db->query("SELECT * FROM `category`");
		return $output->result();	
	}
	
	public function search_book($isbn){
		$output = $this->db->query("SELECT * FROM `books` WHERE isbn10='$isbn' OR isbn13='$isbn'");
		return $output->result();
	}
	
	public function img($id){
		$output = $this->db->query("SELECT * FROM `images` WHERE image_id='$id'");
		return $output->result();
	}
	
	public function book_check($book_id){
		$output = $this->db->query("SELECT * FROM `books` WHERE book_id='$book_id'");
		return $output->result();
	}
	
	public function store_check($book_id, $store_id){
		$output = $this->db->query("SELECT * FROM `shopstock` WHERE book_id='$book_id' && store='$store_id'");
		return $output->result();
	}
	
	public function image_id(){
		$output = $this->db->query("SELECT `image_id` FROM `images` ORDER BY `image_id` DESC LIMIT 1");
		return $output->result();
	}
	public function book_id(){
		$output = $this->db->query("SELECT `book_id` FROM `books` ORDER BY `book_id` DESC LIMIT 1");
		return $output->result();
	}
	
	public function bookshop($store_id){
		$output = $this->db->query("SELECT * FROM `bookshop` WHERE shop_id='$store_id'");
		return $output->result();
	}
	
	public function publish_book($book_details, $stock_details, $image_details){
		
		if($image_details == array()){
			//do nothing
		}else{
			$this->db->insert('images', $image_details);
		}
		$this->db->insert('books', $book_details);
		$this->db->insert('shopstock', $stock_details);
		
	}
}

?>