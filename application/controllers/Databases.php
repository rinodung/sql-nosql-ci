<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databases extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()	{
		$this->load->helper('url');

		$this->load->database('mysql');
		$this->load->library("Mongo_db");
		

		$result = array();
		if(!empty($_POST)) {	
			
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->select($table, $num);			
			
		}

		if($this->db->conn_id) {
			$sqlStatus = true;
		} else {
			$sqlStatus = false;
		}

		if(isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected) {
			$mongoDbStatus = true;
		} else {
			$mongoDbStatus = false;
		}
		

		$data = array("mongoDbStatus" => $mongoDbStatus, 
			"sqlStatus" => $sqlStatus, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/databases', $data);
	}

	public function insert() {
		$this->load->helper('url');

		$this->load->database('mysql');
		$this->load->library("Mongo_db");
		$result = array();
		if(!empty($_POST)) {
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->insert($table, $num);			
			
		}

		if($this->db->conn_id) {
			$sqlStatus = true;
		} else {
			$sqlStatus = false;
		}

		if(isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected) {
			$mongoDbStatus = true;
		} else {
			$mongoDbStatus = false;
		}
		

		$data = array("mongoDbStatus" => $mongoDbStatus, 
			"sqlStatus" => $sqlStatus, "result" => $result);


		$this->load->helper('url');
		$this->load->view('databases/insert', $data);
	}

	public function update() {
		$this->load->helper('url');
		$this->load->database('mysql');
		$this->load->library("Mongo_db");

		$result = array();
		if(!empty($_POST)) {
			
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->update($table, $num);			
			
		}

		if($this->db->conn_id) {
			$sqlStatus = true;
		} else {
			$sqlStatus = false;
		}

		if(isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected) {
			$mongoDbStatus = true;
		} else {
			$mongoDbStatus = false;
		}
		

		$data = array("mongoDbStatus" => $mongoDbStatus, 
			"sqlStatus" => $sqlStatus, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/update', $data);
	}

	public function delete() {
		$this->load->helper('url');
		$this->load->database('mysql');
		$this->load->library("Mongo_db");
		
		$result = array();
		if(!empty($_POST)) {
			
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->delete($table, $num);			
			
		}

		if($this->db->conn_id) {
			$sqlStatus = true;
		} else {
			$sqlStatus = false;
		}

		if(isset($this->mongo_db->connect->connected) && $this->mongo_db->connect->connected) {
			$mongoDbStatus = true;
		} else {
			$mongoDbStatus = false;
		}
		

		$data = array("mongoDbStatus" => $mongoDbStatus, 
			"sqlStatus" => $sqlStatus, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/delete', $data);
	}

	public function edit($name) {
		$data = array();
		$data["name"] = $name;
		$this->load->helper('url');
		$this->load->view('databases/edit-databases', $data);
	}
}
