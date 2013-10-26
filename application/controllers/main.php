<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login | VBS';
		$this->load->view('login', $data);	
	}
	
	
	public function dashboard(){
		$data['title'] = 'Dashboard Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('dashboard', $data);
		
	}
	
	public function search_book(){
		if(!isset($_POST['isbn'])){
			$this->dashboard();
		}else{
			$isbn = $_POST['isbn'];
			
			$output = $this->database->search_book($isbn);
			
			if($output == array()){
				echo '';
			}else{
				$output1 = get_object_vars($output[0]);
				$image_id = $output1['image_id'];
				$image_details = $this->database->img($image_id);
				$image_details1 = get_object_vars($image_details[0]);
				$output2 = array($output1, $image_details1);
				print_r(json_encode($output2));
			}
		}
	}
	
	
	public function login_entry()
	{
		
		if (!isset($_POST['name'])){
			$this->index();
		}else{
			$login_details = array(
				'user' => $_POST['name'],
				'pass' => $_POST['pass']
			);
			
			$output = $this->database->login($login_details);
			
			
			if($output == array()){
				echo 'User or Password invalid!';exit();
				
			}else{
			
				$sess_data = array(
					'user_id' => $output[0]->user_id,
					'access_right' => $output[0]->access_right,
					'profile_id' => $output[0]->profile_id
				);
				
				$this->session->set_userdata($sess_data);
				
				echo 'successful';exit();
			}
		}
	}

	
	public function logout(){
		$this->session->sess_destroy();

		$this->index();
	}
	
	public function publish(){
		
		if (!isset($_POST['name'])){
			$this->index();
		}else{
			echo 'Successful!!';exit();
		}
	}
	
}
