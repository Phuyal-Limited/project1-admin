<?php 
include 'main.php';
class Admin extends Main{
	
	public function dashboard(){
		$data['title'] = 'Dashboard Nepal Reads';
		
		$this->load->view('admin/dashboard', $data);
		
	}
	
	public function logout(){
		
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
				print_r(json_encode($output));
			}
		}
	}
	
	
}

?>