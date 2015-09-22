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
class Admin extends Controller {

	function Admin()
	{
		parent::__construct();
		$this->load->model("Admin_model","",TRUE);
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('adminAuthentification_view');
	}
	
	public function login() {
		if (isset($_POST['login'])){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
	    }
	    if ($this->form_validation->run()== TRUE){
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');
			
			if ($this->Admin_model->cekAccount($username,$password)){	
				$this->session->set_userdata('username',$username);
				$this->load->view('adminDataFilter_view');
			}
			else {
				//pesan kesalahan 
				$this->session->set_flashdata('messageError', '<p" >Maaf, username atau password Anda salah</p>');
				redirect('admin');
			}
	    }
	    else{
				//pesan kesalahan 
				$this->session->set_flashdata('messageError', '<p" >username dan password harus diisi</p>');
				redirect('admin');
	    }
	}
	
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		$this->load->view('adminAuthentification_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
