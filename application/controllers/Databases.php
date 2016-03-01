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

		$result = array();
		if(!empty($_POST)) {
			$this->output->enable_profiler(TRUE);
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->select($table, $num);			
			
		}

		$mysql = $this->load->database('mysql', TRUE);
		$this->load->library("Mongo_db");
		$mongoDb = $this->mongo_db;

		$data = array("mongodb" => $mongoDb, "mysql" => $mysql, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/databases', $data);
	}

	public function insert() {
		$this->load->helper('url');

		$result = array();
		if(!empty($_POST)) {
			$this->output->enable_profiler(TRUE);
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->insert($table, $num);			
			
		}

		$mysql = $this->load->database('mysql', TRUE);
		$this->load->library("Mongo_db");
		$mongoDb = $this->mongo_db;

		$data = array("mongodb" => $mongoDb, "mysql" => $mysql, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/insert', $data);
	}

	public function update() {
		$this->load->helper('url');

		$result = array();
		if(!empty($_POST)) {
			$this->output->enable_profiler(TRUE);
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->update($table, $num);			
			
		}

		$mysql = $this->load->database('mysql', TRUE);
		$this->load->library("Mongo_db");
		$mongoDb = $this->mongo_db;

		$data = array("mongodb" => $mongoDb, "mysql" => $mysql, "result" => $result);

		$this->load->helper('url');
		$this->load->view('databases/update', $data);
	}

	public function delete() {
		$this->load->helper('url');

		$result = array();
		if(!empty($_POST)) {
			$this->output->enable_profiler(TRUE);
			$this->load->database();
			$this->load->model('users');
			$table = "users";
			$num = $_POST["record"];
			$result = $this->users->delete($table, $num);			
			
		}

		$mysql = $this->load->database('mysql', TRUE);
		$this->load->library("Mongo_db");
		$mongoDb = $this->mongo_db;

		$data = array("mongodb" => $mongoDb, "mysql" => $mysql, "result" => $result);

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
