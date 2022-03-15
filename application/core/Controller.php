<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller{
    public function __construct(){
		parent::__construct();

        $this->authenticated(); 
	}

    public function authenticated(){ 
        if($this->uri->segment(1) != 'home' && $this->uri->segment(1) != ''){
            if( ! $this->session->userdata('authenticated')) 
                redirect('home'); 
        }
    }

    public function render_login($content, $data = NULL){
       
        $data['contentnya'] = $this->load->view($content, $data, TRUE);

        $this->load->view('index/login/index', $data);
    }

    public function render_register($content, $data = NULL){
      
        $data['contentnya'] = $this->load->view($content, $data, TRUE);

        $this->load->view('index/register/index', $data);
    }

    public function render_backend($content, $data = NULL){
      
        $data['headernya'] = $this->load->view('index/index/header', $data, TRUE);
        $data['contentnya'] = $this->load->view($content, $data, TRUE);

        $this->load->view('index/index/index', $data);
    }
}
