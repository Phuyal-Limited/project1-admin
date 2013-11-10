<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Login | Nepal Reads';
		$this->load->view('login', $data);	
	}
	

	public function add_book()
	{
		$data['title'] = 'Add Book | Nepal Reads';
		$data['category'] = $this->database->category();
		$this->load->view('add-book', $data);	
	}

	public function dashboard(){
		//check for session
		if(!isset($this->session->userdata['user_id']) && !isset($this->session->userdata['access_right']) && !isset($this->session->userdata['profile_id'])){
	
			$this->index();
		}else{
		
			$data['title'] = 'Dashboard | Nepal Reads';
			
			$this->load->view('dashboard', $data);
		}
	}
	
	public function search_book(){
		//check if isnb posted by ajax or not
		if(!isset($_POST['isbn'])){
			$this->dashboard();
		}else{
			$isbn = $_POST['isbn'];
			
			$output = $this->database->search_book($isbn);
			
			if($output == array()){
				$error = array('error'=> '1');
				print_r(json_encode($error));
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
		//check if submit button clicked or not
		if (!isset($_POST['name'])){
			$this->index();
		}else{
			$pass = $_POST['pass'];
			$pass = sha1($pass);
			$login_details = array(
				'user' => $_POST['name'],
				'pass' => $pass
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
		//check if data from ajax submitted or not
		
		if (!isset($_POST['book_name'])){
			$this->index();
		}else{
			
			$book_id = $this->input->post('book_id');
			$store_id = $this->session->userdata['profile_id'];
			
			//check if the book details entered exists or not with book_id
			$book_check = $this->database->book_check($book_id);
			$store_stock = $this->database->store_check($book_id, $store_id);
			
			//no record in stock for that store
			if($store_stock == array()){
			
				//book doesnot exist
				if($book_check == array()){
					//image upload
					//get last image_id
					$imgcheck = $_FILES['image']['error'];
					
					//image not inserted so set default image_id
					if($imgcheck != 0){
						$img_id = 2;
						
						$image_details = array();
					}else{
						//image inserted
						
						$image_id = $this->database->image_id();
						
						if($image_id == array()){
							$img_id = 1;
						}else{
							$img_id = $image_id[0]->image_id;
							
							$img_id = $img_id + 1;
							
						}
						$imgname = $_FILES['image']['name'];
						$ext = explode('.', $imgname);
						
						$ext_name = $ext[1];
						
						$dir = 'http://admin.nepalreads.com/assets/images/book_image/';
						
						$tempname = $_FILES['image']['tmp_name'];
						$size = $_FILES['image']['size'];
						$type = $_FILES['image']['type'];
						
						//check image
						if($ext_name == 'jpg' OR $ext_name == 'jpeg' OR $ext_name == 'png'){
							//test

						}else{
							echo 'Invalid File Type';exit();
						}
						if($size > 2097152){
							echo 'File Size Larger';exit();
						}
						print_r($_FILES['image']);exit();
						$abc = move_uploaded_file($tempname, $dir.$img_id.'.'.$ext_name);
						echo $abc;exit();
						$image_details = array(
							'image_id' => $img_id,
							'name' => $this->input->post('book_name'),
							'path' => 'http://admin.nepalreads.com/assets/images/book_image/'.$img_id.'.'.$ext_name, 
							'alt' => $this->input->post('book_name'),
							'system_image' => 0,
							'shared' => 0
						);
						
					}
					
					//check for delivery cost
					$delivery_in_city = $this->input->post('delivery_cost_within_city');
					$delivery_outof_city = $this->input->post('delivery_cost_outof_city');
					$delivery_cost = $this->database->bookshop($store_id);
					
					if($delivery_in_city == ''){
						$delivery_in_city = $delivery_cost[0]->delivery_cost_within_city;
						
					}
					if($delivery_outof_city == ''){
						$delivery_outof_city = $delivery_cost[0]->delivery_cost_outof_city;
						
					}
					
					$bok_id = $this->database->book_id();
					
					if($bok_id == array()){
						$id = 1;
					}else{
						$id = $bok_id[0]->book_id;
						
						$id = $id + 1;
						
					}
					$wt = $this->input->post('weight');
					if($wt==''){
						$wt = 0;
					}
					
					$book_details = array(
						//'book_id' => '',
						'book_name' => $this->input->post('book_name'),
						'isbn10' => $this->input->post('isbn10'),
						'isbn13' => $this->input->post('isbn13'),
						'author' => $this->input->post('author'),
						'description' => $this->input->post('description'),
						'category_id' => $this->input->post('category_id'),
						'publisher' => $this->input->post('publisher'),
						'image_id' => $img_id,
						'language' => $this->input->post('language'),
						'weight' => $wt,
						'published_date' => $this->input->post('published_date'),		
					);
					$store_ref = $this->input->post('store_ref');
					if($store_ref == ''){
						$store_ref = 'N/A';
					}
					$stock_details = array(
						//'stock_id' => '',
						'store' => $store_id,
						'book_id' => $id,
						'price' => $this->input->post('price'),
						'item_no_for_store_ref' => $this->input->post('store_ref'),
						'delivery_cost_within_city' => $delivery_in_city,
						'delivery_cost_outof_city' => $delivery_outof_city,
						'stock' => $this->input->post('qty')
					);
					
					
					$this->database->publish_book($book_details, $stock_details, $image_details);
					
					echo 'Book Successfully Added.';exit();
	
				}else{                                   //book_id exists so add only prices and quantity in shop_stock
					
					//check for delivery cost
					$delivery_in_city = $this->input->post('delivery_cost_within_city');
					$delivery_outof_city = $this->input->post('delivery_cost_outof_city');
					$delivery_cost = $this->database->bookshop($store_id);
					
					if($delivery_in_city == ''){
						$delivery_in_city = $delivery_cost[0]->delivery_cost_within_city;
						
					}
					if($delivery_outof_city == ''){
						$delivery_outof_city = $delivery_cost[0]->delivery_cost_outof_city;
						
					}
					$stock_details = array(
						'store' => $store_id,
						'book_id' => $this->input->post('book_id'),
						'price' => $this->input->post('price'),
						'item_no_for_store_ref' => $this->input->post('store_ref'),
						'delivery_cost_within_city' => $delivery_in_city,
						'delivery_cost_outof_city' => $delivery_outof_city,
						'stock' => $this->input->post('qty')
					);
					
					$this->database->input_shopstock($stock_details);
					echo 'Book Successfully Added.';exit();
				}
			}else{                                       //stock record exists			
				echo "Book already exists in your store";exit();
			}
				
		}
	}
	
	public function book_page(){
		$store_id = $this->session->userdata['profile_id'];
		$store_books = $this->database->store_books($store_id);
		print_r(json_encode($store_books));exit();
	}
	
	public function all_books(){
		
		//print_r($_POST['book']);exit();
		$data['title'] = 'My Books | Nepal Reads';
		
		
		$this->load->view('all-books', $data);
		$this->load->view('footer-dash');
	}

	
	
	public function get_details(){
		if(!isset($_POST['book_id'])){
			$this->index();
		}else{
			$book_id = $_POST['book_id'];
			$stock_id = $_POST['stock_id'];
			$store_id = $_POST['store_id'];
			$details = $this->database->get_details($book_id, $stock_id, $store_id);
			print_r(json_encode($details));exit();
		}
	}
	
	public function delete_item(){
		if(!isset($_POST['book_id'])){
			$this->index();
		}else{
			$book_id = $_POST['book_id'];
			$stock_id = $_POST['stock_id'];
			$store_id = $_POST['store_id'];
			$this->database->delete_item($book_id, $stock_id, $store_id);
			echo 'Item Deleted Successfully';exit();
		}
	}
	
	public function update_item(){
		if(!isset($_POST['book_id'])){
			$this->index();
		}else{
			
			$book_id = $_POST['book_id'];
			
			$stock_id = $_POST['stock_id'];
			$store_id = $_POST['store_id'];
			$price = $_POST['price'];
			$delivery_cost_within_city = $_POST['delivery_cost_within_city'];
			$delivery_cost_outof_city = $_POST['delivery_cost_outof_city'];
			$store_ref = $_POST['store_ref'];
			$qty = $_POST['qty'];
			
			$this->database->update_item($book_id, $stock_id, $store_id, $price, $delivery_cost_within_city, $delivery_cost_outof_city, $store_ref, $qty);
			echo 'Item Updated Successfully';exit();
		}
	}
	
	public function message()
	{
		$data['title'] = 'Message | Nepal Reads';
		$this->load->view('messages', $data);	
	}
	
}
