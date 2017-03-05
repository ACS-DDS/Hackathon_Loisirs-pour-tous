<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->library(array("form_validation","session"));
		$this->load->helper(array("url","form"));
		$this->load->model("home_model");

		$this->output->enable_profiler(true);
	}

	public function index(){
		$data = new stdClass();

		if($this->form_validation->run() === false){
			// validation not ok, send validation errors to the view
			$this->load->view("header");
			$this->load->view("home");
			$this->load->view("footer");

			session_destroy();
		}
		else{
			$city           = strtoupper($this->input->post("city"));
			$etablissements = $this->input->post("etablissements");
			$longitude      = $this->input->post("longitude");
			$latitude       = $this->input->post("latitude");
			$filtres        = $this->input->post("filtres");

			// set session user datas
			$_SESSION["city"]           = (string)$city;
			$_SESSION["etablissements"] = (string)$etablissements;
			$_SESSION["longitude"]      = (int)$longitude;
			$_SESSION["latitude"]       = (int)$latitude;
			$_SESSION["filtres"]        = (array)$filtres;

			if($city && $filtres){
				if($this->home_model->get_data_from_city($city,$filtres)){
					$_SESSION["data_city"] = $this->home_model->get_data_from_city($city,$filtres);
					redirect("resultat",$data);
				}
			}
			if($etablissements && $filtres){
				if($this->home_model->get_data_from_etab($etablissements,$filtres)){
					redirect("resultat");
				}
			}
			if($longitude && $latitude && $filtres){
				if($this->home_model->get_data_from_geo($longitude,$latitude,$filtres)){
					redirect("resultat");
				}
			}
		}
	}

	public function about(){
		$this->load->view("header");
		$this->load->view("about");
		$this->load->view("footer");
	}

	public function resultat(){
		if($this->form_validation->run() === false){
			// validation not ok, send validation errors to the view
			$this->load->view("header");
			$this->load->view("resultat");
			$this->load->view("footer");

			session_destroy();
		}
		else{
			$filtres = strtoupper($this->input->post("city"));

			if($city){
				if($this->home_model->get_data_from_city($city)){
					$_SESSION["data_city"] = $this->home_model->get_data_from_city($city);
					redirect("resultat",$data);
				}
			}
			if($etablissements){
				if($this->home_model->get_data_from_etab($etablissements)){
					redirect("resultat");
				}
			}
			if($longitude && $latitude){
				if($this->home_model->get_data_from_geo($longitude,$latitude)){
					redirect("resultat");
				}
			}
		}
	}

	public function hack(){
		$this->load->view("hack");
	}

	public function send(){
		$data = new stdClass();

		$filtres = $this->input->post("filtres");
		$region  = $this->input->post("region");

		$data = $this->home_model->get_data_from_home($filtres,$region);

		//print_r($data);

		$data = array_map("json_encode",$data);
		$data = array_unique($data);
		$data = array_map("json_decode",$data);

		foreach($data as $activities){
			foreach($activities as $activity){
				echo '<li><a class="'.$activity.'" onclick="test(this.className)">'.$activity.'</a></li>';
			}
		}
	}

	public function resultat2(){
		$data = new stdClass();

		$data->data2 = $this->home_model->get_data_from_type($_SESSION["data"]);

		$this->load->view("header");
		$this->load->view("result2",$data);
		$this->load->view("footer");
	}

	public function session(){
		$_SESSION["data"] = $this->input->post("data");
	}
}