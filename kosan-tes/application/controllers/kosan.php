<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kosan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('kosan_model','',TRUE);
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('dashboard_view');
	}
	
	public function showDataFilterView(){
		$is_active=$this->session->userdata("is_active");
		if($is_active == 1){
			$data['jenis_kosan']=$this->kosan_model->getJenisKosan();
			$data['area_kosan']=$this->kosan_model->getAreaKosan();
			$data['isErrorMessage'] = 1;
			$data['errorMessage']= "Data yang dicari tidak ada";
			$this->load->view('dataFilter_view',$data);
		} else {
			$data['jenis_kosan']=$this->kosan_model->getJenisKosan();
			$data['area_kosan']=$this->kosan_model->getAreaKosan();
			$data['isErrorMessage'] = 0;
			$this->load->view('dataFilter_view',$data);
		}
	}
	
	public function showKosanSpesification(){
		$id_type = $this->uri->segment(3);
		$jenis_criteria = $this->uri->segment(4);
		$jenis_criteria=trim($jenis_criteria);
		$jenis_criteria=str_ireplace("%20"," ",$jenis_criteria);
		$data['kosan_specification']=$this->kosan_model->getKosanSpekFromDB($id_type,$jenis_criteria);
		$data['kosan'] =$this->kosan_model->getKosan($id_type);
		$data['list_criteria_nw'] =$this->kosan_model->criteriaNW();
		
	    $this->load->view('kosanSpesification_view',$data);
	}
	
	public function showKosanFilter(){
		$msg = 'My secret message';
		$encrypted_string = $this->encrypt->encode($msg);
		if (isset($_POST['cari'])){
			$dataFilter['data_jenis_kosan']=$this->input->post("jenis_kosan");
			$dataFilter['data_area_kosan']=$this->input->post("area_kosan");
			$data['lowPrice']=(int)$this->input->post("lowPrice");
			$data['highPrice']=(int)$this->input->post("highPrice");
			$this->session->set_userdata("lowPrice",$data['lowPrice']);
			$this->session->unset_userdata("highPrice");
			$this->session->set_userdata("highPrice",$data['highPrice']);
			$this->session->unset_userdata("jeniskosan");
		 	$this->session->set_userdata("jeniskosan",$dataFilter['data_jenis_kosan']);
			$this->session->unset_userdata("areakosan");
		 	$this->session->set_userdata("areakosan",$dataFilter['data_area_kosan']);
		} else {
			$data['lowPrice']=$this->session->userdata("lowPrice");
			$data['highPrice']=$this->session->userdata("highPrice");
			$dataFilter['data_jenis_kosan']=$this->session->userdata("jeniskosan");
			$dataFilter['data_area_kosan']=$this->session->userdata("areakosan");
		}
		
		//pagination
		$page = isset($_GET['page']) ? $_GET['page'] : 1; 
		$data['halaman'] = $page;	
		$limit = 6;  
		$pertama = 0;
		$mulai_dari = $limit * ($page - 1);
		$total_rows = $this->kosan_model->countKosanFromDB($dataFilter);
		$banyakHalaman = ceil($total_rows / $limit);
		$data['total_pages'] = $banyakHalaman;
		$data['result_filter'] = $this->kosan_model->selectKosanFromDB($dataFilter,$mulai_dari,$limit);
		print_r($data['result_filter']->num_rows());
		if($data['result_filter']->num_rows() > 0) {
				$this->load->view('resultFilter_view',$data);
	   } else {
				$data['jenis_kosan']=$this->kosan_model->getJenisKosan();
				$data['area_kosan']=$this->kosan_model->getAreaKosan();
				$data['isErrorMessage'] = 1;
				$data['errorMessage']= "Data yang dicari tidak ada";
				$this->load->view('dataFilter_view',$data);
	   }
	}

}