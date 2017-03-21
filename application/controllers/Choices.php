<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Choices extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->library(array("session"));
		$this->load->model("home_model");

		$this->output->enable_profiler(false);
	}

	public function session(){
		$_SESSION["activity"] = $this->input->post("activity");
		$_SESSION["filtres"] = $this->input->post("filtres");
		$_SESSION["region"] = $this->input->post("region");
	}

	public function send(){
		$data = new stdClass();

		$filtres = $this->input->post("filtres");
		$region  = $this->input->post("region");

		$data->activites = $this->home_model->get_data_from_home($filtres,$region);

		$data->activites = array_map("json_encode",$data->activites);
		$data->activites = array_unique($data->activites);
		$data->activites = array_map("json_decode",$data->activites);

		$this->load->view("liste_activite",$data);
	}
}