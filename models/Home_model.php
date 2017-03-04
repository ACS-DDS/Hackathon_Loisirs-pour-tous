<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home_model extends CI_model{
	public function __construct(){
		parent::__construct();

		$this->load->database();
	}

	public function send_data($city,$etablissements,$longitude,$latitude){
		$array = array(":city" => $city);
		$__where_array = array(
			"surdity"  => "H_Auditory",
			"blind"    => "H_Visual",
			"mental"   => "H_Mental",
			"mobility" => "H_Mobility");

		$req = "";

		if(is_array($filter)){
			$req = " AND ";

			static $i = 0;

			foreach($filter as $key => $val){
				if($key != "city" && $key != "etablissements" && $key != "longitude" && $key != "latitude"){
					if($i == 0){
						$req .= "(";
					}
					if($i > 0){
						$req .= " OR ";
					}
					$req .= " " . $__where_array[$val] . " = 1";
					$i ++;
				}
			}

			if($i > 0){
				$req .= ")";
			}
			else{
				$req .= "(".implode(" = 1 OR ", $__where_array)." = 1)";
			}
		}

		/* renvoie les établissements correspondant à une ville précise */
		return $this->db->query("SELECT * FROM EST_Access2 WHERE city=:city AND longitude IS NOT NULL AND latitude IS NOT NULL " . $req . " ORDER BY city",$array);
	}

	public function get_data_from_city($city,$filtres){
		$this->db->from("est_access2");
		$this->db->where("city",$city);

		if(is_array($filtres)){
			foreach($filtres as $filtre) {
				$this->db->where($filtre,1);
				return $this->db->get()->result();
			}
		}

		if($filtres == "h_visual"){
			$this->db->where("h_visual",1);
			return $this->db->get()->result();
		}
		if($filtres == "h_auditory"){
			$this->db->where("h_auditory",1);
			return $this->db->get()->result();
		}
		if($filtres == "h_mental"){
			$this->db->where("h_mental",1);
			return $this->db->get()->result();
		}
		if($filtres == "h_mobility"){
			$this->db->where("h_mobility",1);
			return $this->db->get()->result();
		}
	}

	public function get_data_from_etab($etablissements,$filtres){
		return true;
	}

	public function get_data_from_geo($longitude,$latitude,$filtres){
		return true;
	}
}