<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();

		$this->load->library(array("form_validation","session"));
		$this->load->helper(array("url","form"));
		$this->load->model("home_model");

		$this->output->enable_profiler(false);
	}

	public function index(){
		$this->load->view("header");
		$this->load->view("home");
		$this->load->view("footer");

		session_destroy();
	}

	public function about(){
		$this->load->view("header");
		$this->load->view("about");
		$this->load->view("footer");
	}

	public function resultat(){
		$this->load->library("pagination");

		$data = new stdClass();

		$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

		$config["per_page"] = 15;
		$config["base_url"] = "http://corentinp.dijon.codeur.online/hackathonv3/resultat/";
		if(is_array($_SESSION["filtres"])){
			$config["total_rows"] = $this->home_model->count_get_data_from_type($_SESSION["activity"],$_SESSION["filtres"],0);
		}
		else{
			$config["total_rows"] = $this->home_model->count_get_data_from_type($_SESSION["activity"],substr($_SESSION["filtres"],10),1);
		}
		$config["uri_segment"] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = round($choice);
		$config["full_tag_open"] = '<ul class="pagination pagination-sm">';
		$config["full_tag_close"] = "</ul>";
		$config["cur_tag_open"] = '<li class="active"><a href="#">';
		$config["cur_tag_close"] = '</a></li>';
		$config["num_tag_open"] = '<li>';
		$config["num_tag_close"] = "</li>";
		$config["next_tag_open"] = "<li>";
		$config["next_tag_close"] = "</li>";
		$config["prev_tag_open"] = "<li>";
		$config["prev_tag_close"] = "</li>";

		$this->pagination->initialize($config);
		$data->pagination = $this->pagination->create_links();

		$data->data2 = $this->home_model->get_data_from_type($_SESSION["activity"],$_SESSION["filtres"],$_SESSION["region"],$config["per_page"],$page,0);

		$this->load->view("header");
		$this->load->view("resultat",$data);
		$this->load->view("footer");
	}

	public function view($docid){
		$data = new stdClass();

		$data->data2 = $this->home_model->get_data_from_docid($docid);

		$this->load->view("header");
		$this->load->view("vue",$data);
		$this->load->view("footer");
	}
}