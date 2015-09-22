<?php
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
class Admin_model extends Model
{
	function Admin_model()
	{
		parent::Model();
		$this->load->helper('file');
		$this->load->library('encrypt');
	}
	
	function cekAccount($username,$password){
		if((!read_file('./account.txt'))&&(!read_file('./account2.txt'))){
			$username=$this->encrypt->encode($username);
			$password=$this->encrypt->encode($password);
			write_file('./account.txt', $username);
			write_file('./account2.txt', $password);
		}else{
			$temp1=$this->encrypt->decode(read_file('./account.txt'));
			$temp2=$this->encrypt->decode(read_file('./account2.txt'));
		
			if(($temp1==$username) and ($temp2==$password)){
			  return TRUE;
			}else{
			  return FALSE;
			}
		}
	}
	
	
}