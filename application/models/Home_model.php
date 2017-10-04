<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home_model extends CI_model {
	public function __construct() {
		parent::__construct();

		$this->load->database();
	}

	public function send_data($city, $etablissements, $longitude, $latitude) {
		$array = array(":city" => $city);

		$__where_array = array(
			"surdity"  => "H_Auditory",
			"blind"    => "H_Visual",
			"mental"   => "H_Mental",
			"mobility" => "H_Mobility"
		);

		$req = "";

		if (is_array($filter)) {
			$req = " AND ";

			static $i = 0;

			foreach ($filter as $key => $val) {
				if ($key != "city" && $key != "etablissements" && $key != "longitude" && $key != "latitude") {
					if ($i == 0)
						$req .= "(";
					if ($i > 0)
						$req .= " OR ";

					$req .= " " . $__where_array[$val] . " = 1";
					$i ++;
				}
			}

			if($i > 0)
				$req .= ")";
			else
				$req .= "(".implode(" = 1 OR ", $__where_array)." = 1)";
		}

		/* renvoie les établissements correspondant à une ville précise */
		return $this->db->query("SELECT * FROM EST_Access2 WHERE city=:city AND longitude IS NOT NULL AND latitude IS NOT NULL " . $req . " ORDER BY city",$array);
	}

	public function get_data_from_city($city, $filtres) {
		$this->db->from("est_access2");
		$this->db->where("city", $city);

		if (is_array($filtres)) {
			foreach ($filtres as $filtre) {
				$this->db->where($filtre, 1);
				return $this->db->get()->result();
			}
		}

		if ($filtres == "h_visual") {
			$this->db->where("h_visual", 1);
			return $this->db->get()->result();
		}
		if ($filtres == "h_auditory") {
			$this->db->where("h_auditory", 1);
			return $this->db->get()->result();
		}
		if ($filtres == "h_mental") {
			$this->db->where("h_mental", 1);
			return $this->db->get()->result();
		}
		if ($filtres == "h_mobility") {
			$this->db->where("h_mobility", 1);
			return $this->db->get()->result();
		}
	}

	public function get_data_from_etab($etablissements, $filtres) {
		return true;
	}

	public function get_data_from_geo($longitude, $latitude, $filtres) {
		return true;
	}

	private function get_region($region) {
		$this->db->select("department");
		$this->db->from("est_access2");
		$this->db->where("department", $region);

		return $this->db->get()->row("department");
	}

	public function get_data_from_home($filtres, $region) {
		$this->db->select("activity");
		$this->db->from("est_access2");
		$this->db->where("activity !=", '');

		foreach ($filtres as $filtre)
			$this->db->where($filtre, "1");

		if ($region == "Alsace-Champagne-Ardenne-Lorraine") {
			$this->db->like("postcode", "67", "after");
			$this->db->or_like("postcode", "68", "after");
			$this->db->or_like("postcode", "71", "after");
			$this->db->or_like("postcode", "28", "after");
			$this->db->or_like("postcode", "10", "after");
			$this->db->or_like("postcode", "51", "after");
			$this->db->or_like("postcode", "52", "after");
			$this->db->or_like("postcode", "54", "after");
			$this->db->or_like("postcode", "55", "after");
			$this->db->or_like("postcode", "57", "after");
			$this->db->or_like("postcode", "88", "after");

			return $this->db->get()->result();
		}
		if ($region == "Aquitaine-Limousin-Poitou-Charentes") {
			$this->db->like("postcode", "24", "after");
			$this->db->or_like("postcode", "33", "after");
			$this->db->or_like("postcode", "40", "after");
			$this->db->or_like("postcode", "47", "after");
			$this->db->or_like("postcode", "64", "after");
			$this->db->or_like("postcode", "19", "after");
			$this->db->or_like("postcode", "23", "after");
			$this->db->or_like("postcode", "87", "after");
			$this->db->or_like("postcode", "16", "after");
			$this->db->or_like("postcode", "17", "after");
			$this->db->or_like("postcode", "79", "after");
			$this->db->or_like("postcode", "86", "after");

			return $this->db->get()->result();
		}
		if ($region == "Auvergne-Rhone-Alpes") {
			$this->db->like("postcode", "03", "after");
			$this->db->or_like("postcode", "15", "after");
			$this->db->or_like("postcode", "43", "after");
			$this->db->or_like("postcode", "63", "after");
			$this->db->or_like("postcode", "01", "after");
			$this->db->or_like("postcode", "07", "after");
			$this->db->or_like("postcode", "26", "after");
			$this->db->or_like("postcode", "38", "after");
			$this->db->or_like("postcode", "42", "after");
			$this->db->or_like("postcode", "69", "after");
			$this->db->or_like("postcode", "73", "after");
			$this->db->or_like("postcode", "74", "after");

			return $this->db->get()->result();
		}
		if ($region == "Bourgogne-Franche-Comte") {
			$this->db->like("postcode", "21", "after");
			$this->db->or_like("postcode", "58", "after");
			$this->db->or_like("postcode", "71", "after");
			$this->db->or_like("postcode", "89", "after");
			$this->db->or_like("postcode", "25", "after");
			$this->db->or_like("postcode", "39", "after");
			$this->db->or_like("postcode", "70", "after");
			$this->db->or_like("postcode", "90", "after");

			return $this->db->get()->result();
		}
		if ($region == "Bretagne") {
			$this->db->like("postcode", "22", "after");
			$this->db->or_like("postcode", "29", "after");
			$this->db->or_like("postcode", "35", "after");
			$this->db->or_like("postcode", "56", "after");

			return $this->db->get()->result();
		}
		if ($region == "Centre-Val de Loire") {
			$this->db->like("postcode", "18", "after");
			$this->db->or_like("postcode", "28", "after");
			$this->db->or_like("postcode", "36", "after");
			$this->db->or_like("postcode", "37", "after");
			$this->db->or_like("postcode", "41", "after");
			$this->db->or_like("postcode", "45", "after");
			$this->db->or_like("postcode", "44", "after");
			$this->db->or_like("postcode", "49", "after");
			$this->db->or_like("postcode", "53", "after");
			$this->db->or_like("postcode", "72", "after");
			$this->db->or_like("postcode", "85", "after");

			return $this->db->get()->result();
		}
		if ($region == "Corse") {
			$this->db->where("postcode", "2A");
			$this->db->where("postcode", "2B");

			return $this->db->get()->result();
		}
		if ($region == "Ile-de-France") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Languedoc-Roussillon-Midi-Pyrénées") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Nord-Pas-de-Calais-Picardie") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Normandie") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Pays-de-la-Loire") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Provence-Alpes-Côte d'Azur") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
	}

	public function get_data_from_type($activity, $filtres, $region, $limit, $start) {
		$this->db->limit($limit,$start);
		$this->db->select("docid, name_est, email_contact, siteweb, phone, fax, address, latitude, longitude");
		$this->db->from("est_access2");
		$this->db->where("activity", $activity);

		if (is_array($filtres))
			foreach ($filtres as $filtre)
				$this->db->where($filtre, "1");
		else
			$this->db->where(substr($filtres, 10), "1");

		if ($region == "Alsace-Champagne-Ardenne-Lorraine") {
			$this->db->like("postcode", "67", "after");
			$this->db->or_like("postcode", "68", "after");
			$this->db->or_like("postcode", "71", "after");
			$this->db->or_like("postcode", "28", "after");
			$this->db->or_like("postcode", "10", "after");
			$this->db->or_like("postcode", "51", "after");
			$this->db->or_like("postcode", "52", "after");
			$this->db->or_like("postcode", "54", "after");
			$this->db->or_like("postcode", "55", "after");
			$this->db->or_like("postcode", "57", "after");
			$this->db->or_like("postcode", "88", "after");

			return $this->db->get()->result();
		}
		if ($region == "Aquitaine-Limousin-Poitou-Charentes") {
			$this->db->like("postcode", "24", "after");
			$this->db->or_like("postcode", "33", "after");
			$this->db->or_like("postcode", "40", "after");
			$this->db->or_like("postcode", "47", "after");
			$this->db->or_like("postcode", "64", "after");
			$this->db->or_like("postcode", "19", "after");
			$this->db->or_like("postcode", "23", "after");
			$this->db->or_like("postcode", "87", "after");
			$this->db->or_like("postcode", "16", "after");
			$this->db->or_like("postcode", "17", "after");
			$this->db->or_like("postcode", "79", "after");
			$this->db->or_like("postcode", "86", "after");

			return $this->db->get()->result();
		}
		if ($region == "Auvergne-Rhone-Alpes") {
			$this->db->like("postcode", "03", "after");
			$this->db->or_like("postcode", "15", "after");
			$this->db->or_like("postcode", "43", "after");
			$this->db->or_like("postcode", "63", "after");
			$this->db->or_like("postcode", "01", "after");
			$this->db->or_like("postcode", "07", "after");
			$this->db->or_like("postcode", "26", "after");
			$this->db->or_like("postcode", "38", "after");
			$this->db->or_like("postcode", "42", "after");
			$this->db->or_like("postcode", "69", "after");
			$this->db->or_like("postcode", "73", "after");
			$this->db->or_like("postcode", "74", "after");

			return $this->db->get()->result();
		}
		if ($region == "Bourgogne-Franche-Comte") {
			$this->db->like("postcode", "21", "after");
			$this->db->or_like("postcode", "58", "after");
			$this->db->or_like("postcode", "71", "after");
			$this->db->or_like("postcode", "89", "after");
			$this->db->or_like("postcode", "25", "after");
			$this->db->or_like("postcode", "39", "after");
			$this->db->or_like("postcode", "70", "after");
			$this->db->or_like("postcode", "90", "after");

			return $this->db->get()->result();
		}
		if ($region == "Bretagne") {
			$this->db->like("postcode", "22", "after");
			$this->db->or_like("postcode", "29", "after");
			$this->db->or_like("postcode", "35", "after");
			$this->db->or_like("postcode", "56", "after");

			return $this->db->get()->result();
		}
		if ($region == "Centre-Val de Loire") {
			$this->db->like("postcode", "18", "after");
			$this->db->or_like("postcode", "28", "after");
			$this->db->or_like("postcode", "36", "after");
			$this->db->or_like("postcode", "37", "after");
			$this->db->or_like("postcode", "41", "after");
			$this->db->or_like("postcode", "45", "after");
			$this->db->or_like("postcode", "44", "after");
			$this->db->or_like("postcode", "49", "after");
			$this->db->or_like("postcode", "53", "after");
			$this->db->or_like("postcode", "72", "after");
			$this->db->or_like("postcode", "85", "after");

			return $this->db->get()->result();
		}
		if ($region == "Corse") {
			$this->db->where("postcode", "2A");
			$this->db->where("postcode", "2B");

			return $this->db->get()->result();
		}
		if ($region == "Ile-de-France") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Languedoc-Roussillon-Midi-Pyrénées") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Nord-Pas-de-Calais-Picardie") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Normandie") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Pays-de-la-Loire") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
		if ($region == "Provence-Alpes-Côte d'Azur") {
			$this->db->where("postcode", "21%");

			return $this->db->get()->result();
		}
	}

	public function count_get_data_from_type($data, $filtres, $test) {
		$this->db->from("est_access2");
		$this->db->where("activity", $data);

		if ($test)
			$this->db->where($filtres, "1");
		else
			foreach ($filtres as $filtre)
				$this->db->where($filtre, "1");

		return count($this->db->get()->result());
	}

	public function get_data_from_docid($docid) {
		$this->db->select("name_est, email_contact, siteweb, postcode, phone, fax, address, longitude, latitude");
		$this->db->from("est_access2");
		$this->db->where("docid", $docid);

		return $this->db->get()->result();
	}
}