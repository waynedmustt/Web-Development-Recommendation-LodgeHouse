<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @property CI_Loader $load
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Email $email
 * @property CI_Form_validation $form_validation
 * @property CI_URI $uri
 * @property Firephp $firephp
 * @property ADOConnection $adodb
 */
class AHP extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("AHP_model","",TRUE);
		$this->load->library('form_validation');
		$this->load->helper('URL');
		$this->load->library('encrypt');
		$this->load->library('session');
	}
	
	public function index()
	{
		$is_active=$this->session->userdata("is_active");
		$data['jenis_kosan']=$this->AHP_model->getJenisKosan();
		$data['area_kosan']=$this->AHP_model->getAreaKosan();
		if($is_active == 1){
			$data['isErrorMessage'] = 1;
			$data['errorMessage']= "Data yang dicari tidak ada";
			$this->load->view('ahpDataFilter_view',$data);
		} else {
			$data['isErrorMessage'] = 0;
			$this->load->view('ahpDataFilter_view',$data);
		}
		
	}
	
	public function showResultFilter(){
		$msg = 'My secret message';
		$encrypted_string = $this->encrypt->encode($msg);
		
		if (isset($_POST['lanjut'])){
			$data_jenis_kosan=$this->input->post("jenis_kosan");
			$data_area_kosan=$this->input->post("area_kosan");
			$data['lowPrice']=(int)$this->input->post("lowPrice");
			$data['highPrice']=(int)$this->input->post("highPrice");
			if($data_jenis_kosan != "*" && $data_area_kosan != "**"){
					$data['ahp_result_filter'] = $this->AHP_model->getKosanFilterFromDB($data_jenis_kosan,$data_area_kosan);
					//session
					$this->session->unset_userdata("kosanFilter");
					$this->session->set_userdata("kosanFilter",json_encode($data['ahp_result_filter']));
					$this->session->unset_userdata("lowPrice");
					$this->session->set_userdata("lowPrice",$data['lowPrice']);
					$this->session->unset_userdata("highPrice");
					$this->session->set_userdata("highPrice",$data['highPrice']);

					if($this->db->affected_rows() != 0) {
							$data['isErrorMessage'] = 0;
							$this->load->view('ahpResultFilter_view',$data);
					   } else {
								$this->session->unset_userdata("is_active");
								$this->session->set_userdata("is_active",1);
								redirect("ahp");
					   }
			} else {
				$this->session->unset_userdata("is_active");
				$this->session->set_userdata("is_active",1);
				redirect("ahp");
			}
		} else {
			$data['ahp_result_filter']=json_decode($this->session->userdata("kosanFilter"));
			$data['lowPrice']=$this->session->userdata("lowPrice");
			$data['highPrice']=$this->session->userdata("highPrice");
			$data['isErrorMessage'] = 0;
			$this->load->view('ahpResultFilter_view',$data);
		}
	}
	
	public function showSelectCriteria(){
		if (isset($_POST['lanjut'])){
				$slctdKosan=$this->input->post("slctdKosan");
			//sampai disini
			if(count($slctdKosan) >= 2){
				$data['isErrorMessage'] = 0;
				$this->session->unset_userdata("slctdKosan");
				$this->session->set_userdata("slctdKosan",implode(",",$slctdKosan));
				$data['slctdKosan']=$slctdKosan;
				$data['criterias']=$this->AHP_model->getAllCriteriasFromDB();
				$this->load->view('ahpSelectCriteria_view',$data);
			} else {
				$data['isErrorMessage'] = 1;
				$data['errorMessage']= "Data yang dicari tidak ada";
				$data['ahp_result_filter']=json_decode($this->session->userdata("kosanFilter"));
				$data['lowPrice']=$this->session->userdata("lowPrice");
				$data['highPrice']=$this->session->userdata("highPrice");;
				$this->load->view('ahpResultFilter_view',$data);
			}
		} else {
			$data['isErrorMessage'] = 0;
			$data['slctdKosan']=explode(",",$this->session->userdata("slctdKosan"));
			$data['criterias']=$this->AHP_model->getAllCriteriasFromDB();
			$this->load->view('ahpSelectCriteria_view',$data);
		}
	}
	
	public function showComparisonPriority(){
		if (isset($_POST['lanjut'])){
			$data['slctdKosan']=$this->input->post("slctdKosan");
			$slctdCriterias=$this->input->post("cbCriteria");
			if($this->AHP_model->checkSlctCriterias($slctdCriterias)){
				$data['isErrorMessage'] = 0;
				$this->session->unset_userdata("slctdCriterias");
				$this->session->set_userdata("slctdCriterias",implode(",",$slctdCriterias));
				$data['slctdCriterias'] = $slctdCriterias;
				$this->load->view('ahpComparisonPriority_view',$data);
			} else {
				$data['isErrorMessage'] = 1;
				$data['errorMessage']= "Data yang dicari tidak ada";
				$data['criterias']=$this->AHP_model->getAllCriteriasFromDB();
				$this->load->view('ahpSelectCriteria_view',$data);
			}
		}else{
		$aktif=$this->session->userdata("aktif");
		if($aktif == 1){
			$data['isErrorMessage'] = 1;
			$data['errorMessage']= "Data yang dicari tidak ada";
			$data['slctdCriterias']=explode(",",$this->session->userdata('slctdCriterias'));
			$data['slctdKosan']=explode(",",$this->session->userdata('slctdKosan'));
			$this->load->view('ahpComparisonPriority_view',$data);	
		} else {
			$data['isErrorMessage'] = 0;
			$data['slctdCriterias']=explode(",",$this->session->userdata('slctdCriterias'));
			$data['slctdKosan']=explode(",",$this->session->userdata('slctdKosan'));
			$this->load->view('ahpComparisonPriority_view',$data);
		}
			
		}
	}
	
	public function showKosanAlternatifAllCriteria(){
		if (isset($_POST['lanjut'])){
			$inpPriorityVal=$this->input->post('inpPriorityVal');
			$slctdKosan=$this->input->post('slctdKosan');
			$slctdCriterias=$this->input->post('slctdCriterias');
			$maxCriteria=count($slctdCriterias);
			$matriksCmprsn=$this->AHP_model->setComparisonPriority($inpPriorityVal,$slctdCriterias);
			$prioritasCriterias=$this->AHP_model->calcPriorityAllCriteria($matriksCmprsn,$slctdCriterias);
			$data['kosan']=$slctdKosan;
			if($this->AHP_model->calcConsistencyRatio($prioritasCriterias,$matriksCmprsn,$slctdCriterias)){
				for($i=0;$i<$maxCriteria;$i++){
					$dataReview=$this->AHP_model->getDataReviewFromDB($slctdKosan,$slctdCriterias[$i]);
					$prioritySubCriterias[$i]=$this->AHP_model->calcPrioritySubCriteria($slctdCriterias[$i],$slctdKosan,$dataReview);
				}
				$KosanRangking=$this->AHP_model->calcRangkingAlternatifKosan($prioritasCriterias,$slctdKosan,$prioritySubCriterias);  //ganti kosan
				$data['prioritasCriterias']=$prioritasCriterias;
				$data['prioritySubCriterias']=json_encode($prioritySubCriterias);
				$data['subKosanRangking']=$KosanRangking['subCriteria'];  //ganti kosan
				$data['KosanRangking']=$KosanRangking['allCriteria'];  //ganti kosan
				$data['slctdKosan']=$this->AHP_model->getKosanName($slctdKosan); //ganti kosan
				$data['slctdCriterias']=implode(", ",$slctdCriterias);
				arsort($data['KosanRangking']);  //ganti kosan
				$this->load->view("ahpAlternatifResult_view",$data);
			}else{ //jika lebih dari 0.1
				//code
				$this->session->unset_userdata("aktif");
				$this->session->set_userdata("aktif",1);
				redirect("ahp/showComparisonPriority");
			}
		}
	}
	
	public function showKosanAlternatifSubCriteria(){
		if (isset($_POST['sub'])){
			$data['criteria']=$this->input->post('criteria_id');
			$data['slctdCriterias']=$this->input->post('slctdCriterias');
			$data['kosan']=$this->input->post('slctdKosan');
			$maxCriteria=count($data['slctdCriterias']);
			for($i=0;$i<$maxCriteria;$i++){
				$subKosanRangking[$i]=$this->input->post('subKosanRangking'.$i);
				$subKosanRangking[$i]=array_combine($data['kosan'],$subKosanRangking[$i]);
			}
			$data['slctdKosan']=$this->AHP_model->getKosanName($data['kosan']);
			$data['KosanRangking']=$subKosanRangking[$data['criteria']];
			$data['subKosanRangking']=$subKosanRangking;
			arsort($data['KosanRangking']);
			$this->load->view('ahpAlternatifResultSubCriteria',$data);	
		}
	}
	
	public function showTreeHierarchy(){
		if (isset($_POST['hierarchy'])){
			$data['prioritasCriterias']=$this->input->post("prioritasCriterias");
			$data['prioritySubCriterias']=json_decode($this->input->post("prioritySubCriterias"));
			$data['slctdCriterias']=$this->input->post('slctdCriterias');
			$data['kosan']=$this->input->post('slctdKosan');
			$maxCriteria=count($data['slctdCriterias']);
			
			$data['slctdKosan']=$this->AHP_model->getKosanName($data['kosan']);
			for($i=0;$i<count($data['slctdCriterias']);$i++){
				$data['subKosanRangking'][$i]=$this->input->post('subKosanRangking'.$i);
				$data['subKosanRangking'][$i]=array_combine($data['kosan'],$data['subKosanRangking'][$i]);
			}
			$this->load->view('ahpTreeHierarchy_view',$data);	
		}
	}	
}
