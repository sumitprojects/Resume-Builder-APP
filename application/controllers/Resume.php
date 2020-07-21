<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!is_array($this->session->userdata('user')) && !$this->session->userdata('login')){
			$this->session->set_flashdata('error','Login Credential is Invalid.');
			redirect('login','refresh');
		}
		$userid = $this->session->userdata('user')['user_id'];
		/**
		 * Get All User Detail By Its Id
		 */
		$data['user_data'] = $this->user->get_user_by($userid);
		$data['current_title'] = $this->exp->get_current($userid)['eduex_name']??'NA';
		$data['per_data'] = $this->per->get_per($userid);
		$data['edu_data'] = $this->edu->get_edu($userid);
		$data['exp_data'] = $this->exp->get_exp($userid);
		$data['lang_data'] = $this->lan->get_lang($userid);
		$this->load->view('front/dashboard',$data);
	}

	public function build_resume(){
		if(!is_array($this->session->userdata('user')) && !$this->session->userdata('login')){
			$this->session->set_flashdata('error','Login Credential is Invalid.');
			redirect('login','refresh');
		}
		$data['token'] = $this->security->get_csrf_token_name();
		$data['hash'] =  $this->security->get_csrf_hash();
		$userid = $this->session->userdata('user')['user_id'];
		$data['user_id'] = $this->encryption->encrypt($userid);
		$this->load->view('front/form_builder',$data);
	}


	public function get_user_data(){
		if(!is_array($this->session->userdata('user')) && !$this->session->userdata('login') || !$this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode(['error'=>'Invalid User']));
			return;
		}
		$data = json_decode(file_get_contents('php://input'), true);
		$data = $this->security->xss_clean($data);
		$userid = $this->encryption->decrypt($data['user_id']);

		$data['user_data'] = $this->user->get_user_by($userid);
		$data['per_data'] = $this->per->get_per($userid);
		$data['edu_data'] = $this->edu->get_edu($userid);
		$data['exp_data'] = $this->exp->get_exp($userid);
		$data['lang_data'] = $this->lan->get_lang($userid);
		$this->output->set_content_type('application/json')->set_output(json_encode(['data'=>$data]));
	}

	public function update_resume(){
		if(!is_array($this->session->userdata('user')) && !$this->session->userdata('login') || !$this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode(['error'=>'Invalid User']));
			return;
		}
		$success = [];
		$success['education'] = [];
		$success['experience'] = [];
		$success['lang'] = [];
		$success['user'] = [];
		$success['person'] = [];

		$data = json_decode(file_get_contents('php://input'), true);
		$data = $this->security->xss_clean($data);
		$userid = $this->encryption->decrypt($data['userhash']);
		if(is_array($data['education']) && !empty($data['education'])){
			foreach($data['education'] as $key => $edu){
				if(isset($edu['eduex_end_date']) && $edu['eduex_end_date'] !== null){
					$edu['eduex_end_date'] = $edu['eduex_end_date'] === '0000-00-00'?NULL:$edu['eduex_end_date'];
				}
				if(isset($edu['eduex_id'])){
					$eduex_id  = $edu['eduex_id'];
					unset($edu['eduex_id']);
					$ans = $this->edu->update_edu($edu,['eduex_id'=>$eduex_id,'eduex_user_id'=>$userid]);
					array_push($success['education'],$ans);
				}else{
					$edu['eduex_user_id'] = $userid;
					$ans = $this->edu->add_edu($edu);
					array_push($success['education'],$ans);
				}
			}
		}

		if(is_array($data['experience']) && !empty($data['experience'])){
			foreach($data['experience'] as $key => $edu){
				if(isset($edu['eduex_end_date'])){
					$edu['eduex_end_date'] = $edu['eduex_end_date'] === '0000-00-00'?NULL:$edu['eduex_end_date'];
				}
				if(isset($edu['eduex_id'])){
					$eduex_id  = $edu['eduex_id'];
					unset($edu['eduex_id']);
					$ans = $this->exp->update_exp($edu,['eduex_id'=>$eduex_id,'eduex_user_id'=>$userid]);
					array_push($success['experience'],$ans);
				}else{
					$edu['eduex_user_id'] = $userid;
					$ans = $this->exp->add_exp($edu);
					array_push($success['experience'],$ans);
				}
			}
		}

		if(is_array($data['langSkill']) && !empty($data['langSkill'])){
			foreach($data['langSkill'] as $key => $edu){
				if(isset($edu['lang_id'])){
					$eduex_id  = $edu['lang_id'];
					unset($edu['lang_id']);
					$ans = $this->lan->update_lang($edu,['lang_id'=>$eduex_id,'lang_user_id'=>$userid]);
					array_push($success['lang'],$ans);
				}else{
					$edu['lang_user_id'] = $userid;
					$ans = $this->lan->add_lang($edu);
					array_push($success['lang'],$ans);
				}
			}
		}
		if(is_array($data['person']) && !empty($data['person'])){
			$per = $data['person'];
			if(isset($per['per_id'])){
				$perid = $per['per_id'];
				unset($per['per_id']);
				$ans = $this->per->update_per($per,['per_id'=>$perid,'per_user_id'=>$userid]);
				array_push($success['person'],$ans);
			}else{
				$per['per_user_id'] = $userid;
				$ans = $this->per->add_per($per);	
				array_push($success['person'],$ans);
			}
		}

		if(is_array($data['user']) && !empty($data['user'])){
			$user = $data['user'];
			$ans = $this->user->update_user($user,['user_id'=>$userid]);
			array_push($success['user'],$ans);
		}

		$this->output->set_content_type('application/json')->set_output(json_encode(['success'=>$success,'redirect'=>site_url('resume')]));
		return;
	}


	public function remove_data($type = ''){
		if(!is_array($this->session->userdata('user')) && !$this->session->userdata('login') || !$this->input->is_ajax_request()){
			$this->output->set_content_type('application/json')->set_output(json_encode(['error'=>'Invalid User']));
			return;
		}

		$data = json_decode(file_get_contents('php://input'), true);
		$data = $this->security->xss_clean($data);
		$id = $data['id'];
		$userid =  $this->encryption->decrypt($data['user_id']);
		if($type === 'lang'){
			$this->lan->delete_lang(['lang_id'=>$data['id'],'lang_user_id'=>$userid]);
		}else if($type === 'edu'){
			$this->edu->delete_edu(['eduex_id'=>$data['id'],'eduex_user_id'=>$userid]);
		}else if($type === 'exp'){
			$this->lan->delete_lang(['eduex_id'=>$data['id'],'eduex_user_id'=>$userid]);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode(true));
		
	}
}
