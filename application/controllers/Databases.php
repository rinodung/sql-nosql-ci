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
	public function index()
	{

		$mysql = $this->load->database('mysql', TRUE);
		$mongoDb = $this->load->database('mongodb', TRUE);

		$data = array("mongodb" => $mongoDb, "mysql" => $mysql);

		$this->load->helper('url');
		$this->load->view('databases/databases', $data);
	}
	public function edit($name) {
		$data = array();
		$data["name"] = $name;
		$this->load->helper('url');
		$this->load->view('databases/edit-databases', $data);
	}
}
