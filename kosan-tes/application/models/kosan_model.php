<?php

class Kosan_model extends CI_Model
{
	
	function getKosanSpekFromDB($id_type,$jenis_criteria){
		$query = $this->db->query("select * from typekosan_specnw
		INNER JOIN spesifikasinonweight, criteria
		WHERE typekosan_specnw.ID_TYPE = '$id_type' AND typekosan_specnw.ID_SPEKNWEIGHT = spesifikasinonweight.ID_SPEKNWEIGHT
		AND spesifikasinonweight.CRITERIA_ID = criteria.CRITERIA_ID AND criteria.CRITERIA_NAME = '$jenis_criteria'");

		return $query;
	}
	
	function criteriaNW(){
		$query = $this->db->query("select * from criteria 
		INNER JOIN criterianonweight 
		WHERE criteria.CRITERIA_ID = criterianonweight.CRITERIA_ID");
		
		return $query;
	}
	
	function getKosan($id_type){
		$query = $this->db->query("select * from type_kosan
		INNER JOIN view_kosan_price, jenis_kosan
		WHERE type_kosan.ID_TYPE = '$id_type' AND view_kosan_price.id_type = '$id_type' 
		AND type_kosan.ID_JENIS = jenis_kosan.ID_JENIS");
		
		return $query;
	}

	function selectKosanFromDB($dataFilter,$mulai_dari,$limit){	
		$jenis_kosan = $dataFilter['data_jenis_kosan'];
		$area_kosan = $dataFilter['data_area_kosan'];
		$lowPrice=$this->session->userdata("lowPrice");
		$highPrice=$this->session->userdata("highPrice");
		 
		if($jenis_kosan == "*" && $area_kosan == "**"){ //jika memilih semua
			//menentukan type kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.ID_TYPE = view_kosan_price.id_type limit $mulai_dari, $limit");
		} elseif ($jenis_kosan != "*" && $area_kosan == "**") { //jika memilih hanya jenis kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_jenis = '$jenis_kosan' AND type_kosan.ID_TYPE = view_kosan_price.id_type limit $mulai_dari, $limit");
		} elseif ($jenis_kosan == "*" && $area_kosan != "**") { //jika memilih hanya area kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_area = '$area_kosan' AND type_kosan.ID_TYPE = view_kosan_price.id_type limit $mulai_dari, $limit");
		} else {
			//menentukan type kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_area = '$area_kosan' AND type_kosan.id_jenis = '$jenis_kosan'
			AND type_kosan.ID_TYPE = view_kosan_price.id_type limit $mulai_dari, $limit");
		}
		
		return $first_query;
	}
	
	function countKosanFromDB($dataFilter){	
		$jenis_kosan = $dataFilter['data_jenis_kosan'];
		$area_kosan = $dataFilter['data_area_kosan'];
		
		if($jenis_kosan == "*" && $area_kosan == "**"){ //jika memilih semua
			//menentukan type kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.ID_TYPE = view_kosan_price.id_type");
		} elseif (ctype_alnum($jenis_kosan)) { //jika memilih hanya jenis kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_jenis = '$jenis_kosan' AND type_kosan.ID_TYPE = view_kosan_price.id_type");
		} elseif (ctype_alnum($area_kosan)) { //jika memilih hanya area kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_area = '$area_kosan' AND type_kosan.ID_TYPE = view_kosan_price.id_type");
		} else {
			//menentukan type kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_area = '$area_kosan' AND type_kosan.id_jenis = '$jenis_kosan'
			AND type_kosan.ID_TYPE = view_kosan_price.id_type");
		}
		
		return $first_query->num_rows();
	}
	
	function getJenisKosan(){
		$query = $this->db->query("select * from jenis_kosan");
		return $query;	
	}
	
	function getAreaKosan(){
		$query = $this->db->query("select * from area");
		return $query;	
	}
}
?>