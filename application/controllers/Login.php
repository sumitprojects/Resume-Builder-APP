<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{

		if(is_array($this->session->userdata('user')) && $this->session->userdata('login')){
			redirect('resume','refresh');
		}


		$data['login'] = true;
		$data['action'] = site_url('login');
		$data['token'] = $this->security->get_csrf_token_name();
		$data['hash'] =  $this->security->get_csrf_hash();
		
		$logindata['user_email']  = $this->input->post('email');
		$logindata['user_password']  = hash('sha512',$this->input->post('password'));
		$logindata = $this->security->xss_clean($logindata);
		
		if ($this->form_validation->run('login') && is_array($logindata) && !empty($logindata)) {
			$user = $this->user->get_user($logindata);
			if(!empty($user) && is_array($user)){
				$session['user'] = $user;
				$session['login'] = true;
				$this->session->set_userdata($session);
				$this->session->set_flashdata('success','Welcome '.$logindata['user_email']);
				redirect('resume','refresh');
			}else{
				$this->session->set_flashdata('error','Login Data is Invalid.');
				$this->load->view('login',$data);
			}
		} else {
			$this->load->view('login',$data);
		}
	}
	
	public function register(){
		$data['login'] = false;
		$data['action'] = site_url('register');
		$data['token'] = $this->security->get_csrf_token_name();
		$data['hash'] =  $this->security->get_csrf_hash();
		$logindata['user_email']  = $this->input->post('email');
		$logindata['user_password']  = hash('sha512',$this->input->post('password'));
		$logindata['user_mobile'] = $this->input->post('mobile');
		$logindata = $this->security->xss_clean($logindata);
		if ($this->form_validation->run('register')) {
			$this->user->add_user($logindata);			
			redirect('login','refresh');
		} else {
			$this->load->view('login',$data);
		}
	}


	public function logout(){
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('login');
		redirect('login','refresh');
	}
}
