<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

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
	public function read(){
        if($this->session->userdata('username')&& $this->session->userdata('level')==1){
        $this->load->model('Read');
        $data['data']=$this->Read->userinfo();
       $this->load->view('profile',$data);
        }
        else{
            redirect('Welcome/index');
        }
    }
    public function readpost(){
        if($this->session->userdata('username')&& $this->session->userdata('level')==1){
        $this->load->model('Read');
        $data['data']=$this->Read->fetchpost();
       $this->load->view('post',$data);
        }
        else{
            redirect('Welcome/index');
        }
    }

    public function teacherDelete($tid){
        $this->load->model('Insert');
        $this->Insert->deleteTeacher($tid);
        redirect('Teacher/showteacher');
    }

}
